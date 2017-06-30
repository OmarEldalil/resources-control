<?php

namespace App\Http\Controllers\Website;

use App\Models\Car;
use App\Models\Vacation;
use App\Services\Uploader;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Employee;

use Illuminate\Support\Facades\Auth;
use Mail;
use Excel;

class EmployeeController extends Controller
{

    protected $employee;
    protected $vacation;
    protected $uploader;

    protected $employeeFillableData = [
        'name','code','office','position','related_project','salary','grade','sex','religion','address','company_mobile','personal_mobile','home_phone','emergency_contact','emergency_relativity','emergency_phone','join_date','vacation_type','contract_date','qualification','qualification_year','army_status','id_number','id_type','id_end_date','marital_status','number_of_children','birth_date','email','health_insurance_number','bank_account','insurance_join_date','insurance_number','const_insurance_salary','var_insurance_salary','total_insurance_salary','company_percentage_const','employee_percentage_const','company_percentage_var','employee_percentage_var','total_company_compensation','total_employee_compensation','resign_date','termination','waiting_list','form_6_date','form_6_number','form_111','gov_health_number','insurance_notes','birth_certificate','army_certificate','qualification_copy','id_copy','personal_photo','criminal_record','employment_decision','insurance_stamp'
    ];

    protected $photoInputs = [
        'birth_certificate' , 'army_certificate' , 'qualification_copy' , 'id_copy' , 'criminal_record' , 'employment_decision' , 'insurance_stamp' , 'personal_photo'
    ];

    protected $employeeInsuranceInputs = [
        'health_insurance_number','bank_account','insurance_join_date','insurance_number','const_insurance_salary','var_insurance_salary','total_insurance_salary','company_percentage_const','employee_percentage_const','company_percentage_var','employee_percentage_var','total_company_compensation','total_employee_compensation'
    ];

    public function __construct(Employee $employee , Uploader $uploader , Vacation $vacation)
    {

        parent::__construct();

        $this->employee = $employee;
        $this->uploader = $uploader;
        $this->vacation = $vacation;

        $user = Auth::user();
        if(!preg_match("/employee-images/" ,$user->abilities)){
            if (!preg_match("/insurance/" ,$user->abilities)){
                abort(404);
            }
        }

        $imageInputs = $this->photoInputs;
        view()->composer(['website.edit_employee'] ,
            function ($view) use ($imageInputs) {
                $view->with('employeeImageInputs' , $imageInputs);
            });


    }

    public function allEmployees () {


        /*Excel::load(storage_path('app/public/employees_filnal.xlsx') , function ($reader) {

            $employees = $reader->all()->toArray();

            $employees = array_slice($employees , 96 , 40);

            $employees = collect($employees)->map(function ($employee , $key) {

                $myEmployee = [];

                $current_date = Carbon::now();

                foreach ($employee as $key => $value) {

                    if (strpos($key , 'date') &&
                        Carbon::parse($value)->day == $current_date->day &&
                        Carbon::parse($value)->month == $current_date->month &&
                        Carbon::parse($value)->year == $current_date->year) {

                        $myEmployee[$key] = null;

                    }elseif ($key == 'email' && $value == 'N/A') {

                        $myEmployee[$key] = null;

                    }else{
                        $myEmployee[$key] = $value;
                    }

                }

                return $myEmployee;

            })->toArray();

            foreach ($employees as $employee) {
                Employee::create($employee);
            }

        });*/

        $employees = $this->employee->whereRaw("
            termination = '0' OR
            waiting_list = '0' OR
            termination is null OR
            waiting_list is null
        ")  ->get()->where('isResigned' , false);

        return view('website.employees' , compact('employees'));

    }

    public function singleEmployee ($employee_id) {

        $employee = $this->employee->findOrFail($employee_id);

        return view('website.single_employee' , compact('employee'));

    }

    public function resigns ()
    {

        $resigns = $this->employee->all()->where('isResigned' , true);

        return view('website.employees.resigns' , compact('resigns'));

    }

    public function terminations ()
    {

        $employees = $this->employee->where('termination' , 1)->get();

        return view('website.employees.terminations' , compact('employees'));

    }

    public function waitingList ()
    {

        $employees = $this->employee->where('waiting_list' , 1)->get();

        return view('website.employees.waiting_list' , compact('employees'));

    }

    public function createEmployee () {


        $employees = $this->employee->all();

        return view('website.create_employee' , compact('employees'));

    }

    public function saveEmployee (Request $request) {

        $employee = new Employee();

        $this->handleEmployeeData($request , $employee);

        return redirect(route('all_employees'))->with('success' , 'تم اضافة الموظف بنجاح');

    }

    public function editEmployee ($employee_id) {

        $employee = $this->employee->findOrFail($employee_id);

        return view('website.edit_employee' , compact('employee'));

    }

    public function updateEmployee (Request $request , $employee_id) {

        $employee = $this->employee->findOrFail($employee_id);

        $this->handleEmployeeData($request , $employee , 'edit');

        return redirect(route('all_employees'))->with('success' , 'تم التعديل بنجاح');

    }

    public function deleteEmployee ($employee_id) {

        $this->employee->findOrFail($employee_id)->delete();

        return redirect(route('all_employees'))->with('success' , 'تم حذف الموظف');

    }

    private function handleEmployeeData (Request $request , $employee , $type = 'create') {

        $user = $request->user();

        foreach ($this->employeeFillableData as $key) {

            if (
                in_array($key , $this->photoInputs) &&
                ($user->authority('admin') || $user->canEdit('employee-images'))
            )
            {
                if (!$employee->$key) {
                    $fileName = $this->uploader->upload($request->file($key) , 'imgs/employees/' . $key . 's');
                    $employee->$key = $fileName;
                    continue;
                }
                continue;
            }

            if ($request->user()->authority('admin')) {
                $employee->$key = ($request->input($key)) ? $request->input($key): null;
            }

        }

        if ($user->authority('admin') || $user->canEdit('insurance')) {
            $this->handleEmployeeInsuranceValues($request , $employee);
        }

        $employee->save();

        if ($type == 'create') $this->handelVacationCreation($employee);

    }

    private function handleEmployeeInsuranceValues (Request $request , $employee) {

        if (
            $request->input('const_insurance_salary') ||
            $request->input('var_insurance_salary')
        ) {

            $const_insurance_salary = $request->input('const_insurance_salary');
            $var_insurance_salary = $request->input('var_insurance_salary');
            $employee->total_insurance_salary = $const_insurance_salary + $var_insurance_salary;
            $company_percentage_const = ceil($const_insurance_salary * 0.24);
            $employee_percentage_const = ceil($const_insurance_salary * 0.16);
            $company_percentage_var = ceil($var_insurance_salary * 0.24);
            $employee_percentage_var = ceil($var_insurance_salary * 0.16);
            $total_company_compensation = $company_percentage_const + $company_percentage_var;
            $total_employee_compensation = $employee_percentage_const + $employee_percentage_var;

            $employee->const_insurance_salary = $const_insurance_salary;
            $employee->const_insurance_salary = $const_insurance_salary;
            $employee->company_percentage_const = $company_percentage_const;
            $employee->employee_percentage_const = $employee_percentage_const;
            $employee->company_percentage_var = $company_percentage_var;
            $employee->employee_percentage_var = $employee_percentage_var;
            $employee->total_company_compensation = $total_company_compensation;
            $employee->total_employee_compensation = $total_employee_compensation;


        }

    }

    public function handelVacationCreation ($employee)
    {

        if (!$employee->vacation) {

            $vacation_start_date = Carbon::parse($employee->join_date)->addMonth(6);

            $last_of_year = Carbon::parse($vacation_start_date)->lastOfYear();

            $vacation_rest = (($last_of_year->month - $vacation_start_date->month) / 12) * $employee->vacation_type;

            $this->vacation->create([
                'employee_code' => $employee->code ,
                'annual' => 0 ,
                'casual' => 0 ,
                'sick' => 0 ,
                'created_at' =>  $vacation_start_date,
                'updated_at' =>  $vacation_start_date,
                'rest' => ceil($vacation_rest)
            ]);

        }

    }

    public function deleteEmployeeImage ($employee_id , $employee_image_input) {

        $employee = $this->employee->findOrFail($employee_id);

        unlink(public_path('imgs/employees/' . $employee_image_input . 's/' . $employee->$employee_image_input ));

        $employee->$employee_image_input = null;

        $employee->save();

        return redirect()->back();

    }


}
