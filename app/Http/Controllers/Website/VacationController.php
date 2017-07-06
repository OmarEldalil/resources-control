<?php

namespace App\Http\Controllers\Website;

use App\Models\Employee;
use App\Models\User;
use App\Models\Vacation;
use App\Models\VacationRequest;
use App\Services\Uploader;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Mail;
use Excel;

class VacationController extends Controller
{

    protected $user;
    protected $employee;
    protected $vacationRequest;
    protected $vacation;
    protected $uploader;

    public function __construct(Employee $employee , User $user , VacationRequest $vacationRequest , Vacation $vacation , Uploader $uploader)
    {

        parent::__construct();

        $this->employee = $employee;
        $this->user = $user;
        $this->vacationRequest = $vacationRequest;
        $this->vacation = $vacation;
        $this->uploader = $uploader;

        $user = Auth::user();
        if ($user->authority != "admin" && $user->authority != "reader") {
            if(! preg_match("/vacations/",$user->abilities )){
            abort(404);
            }
        }

    }

    public function index ()
    {

        $vacationRequests = $this->vacationRequest->where('status' , 'معلقة')->get();

        return view('website.vacations.index' , compact('vacationRequests'));

    }

    public function requests ()
    {

        $vacationRequests = $this->vacationRequest->with(['employee' , 'user'])->latest('created_at')->get();

        return view('website.vacations.requests' , compact('vacationRequests'));

    }

    public function balance (Request $request)
    {

        /*Excel::load(storage_path('app/public/vacation_balance (1).xlsx') , function ($reader) {

            $vacations = $reader->all()->toArray();

            //dd($vacations[0]);

            foreach ($vacations[0] as $vacation) {

                Vacation::create([
                    'employee_code' => $vacation['employee_code'],
                    'annual' => $vacation['annual'] ?: 0,
                    'casual' => $vacation['casual'] ?: 0,
                    'sick' => $vacation['sick'] ?: 0 ,
                    'rest' => $vacation['rest'] ?: 0 ,
                ]);

            }


        });*/

        $user = $request->user();

        $employees = $this->employee;

        if (!$user->authority('admin') && $user->canEdit('vacations')) {
            $employees = $employees->where('email' , '=' , null);
        }

        $employees = $employees->with(['vacation' => function ($query) use ($user) {
            $query->available();
        } , 'vacationRequest'])->get();

        $currentEmployee = $this->employee->with(['vacation' , 'vacationRequest'])->where('code' , (int) $request->user()->code)->get()->first();

        return view('website.vacations.balance' , compact('employees' , 'currentEmployee'));

    }

    public function createVacation ()
    {

        $employees_codes = $this->employee->with('vacation')->get()->where('vacation' , null)->pluck('code' , 'code');

        return view('website.vacations.create_vacation' , compact('employees_codes'));

    }

    public function saveVacation (Request $request)
    {

        $vacation = new Vacation();

        $vacation->employee_code = $request->input('employee_code');
        $vacation->annual = $request->input('annual');
        $vacation->casual = $request->input('casual');
        $vacation->sick = $request->input('sick');
        $vacation->rest = $request->input('rest');

        $vacation->save();

        return redirect(route('vacations_balance'))->with('success' , 'تم أضافة رصيد الأجازات بنجاح');

    }

    public function editVacation ($vacation_id)
    {

        $vacation = $this->vacation->with('employee')->findOrFail($vacation_id);

        return view('website.vacations.edit_vacation' , compact('vacation'));

    }

    public function updateVacation (Request $request , $vacation_id)
    {

        $vacation = $this->vacation->findOrFail($vacation_id);

        $vacation->annual = $request->input('annual');
        $vacation->casual = $request->input('casual');
        $vacation->sick = $request->input('sick');
        $vacation->rest = $request->input('rest');

        $vacation->save();

        return redirect(route('vacations_balance'))->with('success' , 'تم تعديل الأجازة بنجاح');

    }

    public function applyForVacation ($code)
    {

        $employee = $this->employee->where('code' , $code)->first();

        if ($vacationRequest = $employee->lastVacationRequest()) {
            if ($vacationRequest->status == 'معلقة' ) {
                return redirect()->back()->with('success' , 'لديك اجازة مقدم عليها بالفعل ');
            }
        }

        if ($employee->vacation->rest <= 0) {
            return redirect()->back()->with('failed' , 'لقد استنفذت رصيدك من الأجازات');
        }

        return view('website.vacations.vacation_form' , compact('employee'));

    }

    public function postForVacation (Request $request)
    {

        $employee = $this->employee->with('vacation')->where('code' , $request->input('employee_code'))->first();

        $vacation_duration = $this->getVacationDuration($request);

        if ($request->input('vacation_type') == 'عارضة' ) {

            if ($employee->vacation->casual >= 7) {

                return redirect()->back()->with('failed' , 'رصيدك من الأجازات العارضة وصل للحد الأقصى');

            }

            if (($employee->vacation->casual + $vacation_duration) > 7 ) {

                return redirect()->back()->with('failed' , 'رصيد الأجازات العارضة لا يمكن ان يكون اكبر من 7 أجازات فى السنة');

            }

        }

        if ($request->input('vacation_type') == 'مرضية') {
            if (is_null($request->file('sick_image'))) {
                return redirect()->back()->with('failed' , 'لا بد من توفير ما يثبت الحالة المرضية');
            }

            $sick_image_name = $this->uploader->upload($request->file('sick_image') , 'imgs/sick_images');

        }

        if ($employee->vacation->rest <= 0) {
            return redirect()->back()->with('failed' , 'لقد استنفذت رصيدك من الأجازات');
        }

        if (($employee->vacation->rest - $vacation_duration) < 0) {

            return redirect()->back()->with('failed' , 'عدد ايام الاجازة اكبر من المتبقى من رصيد أجازاتك');

        }

        if ($vacation_duration > $employee->vacation->rest) {
            return redirect()->back()->with('failed' , 'مدة الأجازة اكبر من رصيدك المتبقى للأجازات');
        }

        $vacation_request = $this->vacationRequest->create([
            'employee_code' => $employee->code ,
            'user_id' => $request->user()->id,
            'start_date' => $request->input('start_date') ,
            'end_date' => $request->input('end_date') ,
            'vacation_type' => $request->input('vacation_type') ,
            'sick_image' =>  isset($sick_image_name) ? $sick_image_name : null ,
            'vacation_duration' => $vacation_duration ,
            'status' => 'معلقة'
        ]);

        $this->sendVacationRequestMail($vacation_request->toArray() , $employee);

        return redirect(route('vacations_balance'))->with('success' , 'تم أرسال طلب الأجازة');

    }

    private function getVacationDuration (Request $request)
    {

        return (Carbon::parse($request->input('end_date'))->timestamp -
                Carbon::parse($request->input('start_date'))->timestamp) / 86400 + 1;

    }

    public function changeVacationStatus ($vacation_request_id , $status)
    {

        $vacation_request = $this->vacationRequest->with(['employee.vacation' , 'user'])->findOrFail($vacation_request_id);

        switch($status) {
            case 'approved' :
                $vacation_request->status = 'موافقة';
                $this->editEmployeeVacation($vacation_request);
                break;
            case 'refused' :
                $vacation_request->status = 'رفض';
                break;
        }

        $vacation_request->save();

        $this->sendVacationRequestReply($vacation_request->toArray());

        return redirect()->back();

    }

    private function editEmployeeVacation ($vacation_request) {

        $vacation = $vacation_request->employee->vacation;
        $types = ['عارضة' => 'casual' , 'سنوية' => 'annual' , 'مرضية' => 'sick'];

        $posted_type = $types[$vacation_request->vacation_type];

        $vacation->$posted_type += $vacation_request->vacation_duration;
        $vacation->rest -= $vacation_request->vacation_duration;

        $vacation->save();


    }

    private function sendVacationRequestMail ($vacation_request , $employee) {

        $user = request()->user();
        $vacation_request['employee'] = $employee->toArray();

        Mail::send('emails.vacation_request' , $vacation_request ,
            function ($message) use ($user) {

                $message->from('taha@yahoo.com' , 'taha moussa');

                $message->to('prince4moha@yahoo.com' , 'HR.Manager')->subject('طلب أجازة...');

            });

    }

    private function sendVacationRequestReply ($vacation_request) {

        Mail::send('emails.vacation_request_reply', $vacation_request , function($message) use ($vacation_request){

            $message->from('prince4moha@gmail.com','مؤسسة الشرق');

            $message->to('prince4moha@gmail.com', $vacation_request['user']['name'])
                ->subject('الرد على طلب الأجازة');

        });

    }



}
