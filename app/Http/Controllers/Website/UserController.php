<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    protected $user;

    public function __construct(User $user)
    {

        parent::__construct();

        $this->user = $user;

    }

    public function users () {

        $users = $this->user->orderBy('code' , 'asc')->get();

        return view('website.users.all_users' , compact('users'));

    }

    public function createUser ()
    {
        return view('website.users.create_user');
    }

    public function saveUser (Request $request)
    {

        $this->validateUserForm($request);

        $user = new User();

        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));
        $user->code = $request->input('code');
        $user->email = $request->input('email');
        $user->authority = $request->input('authority');
        $user->abilities = ($abilities = $request->input('user_abilities')) ?
                            collect($abilities)->toJson() : null;

        $user->save();

        return redirect(route('users'))->with('success' , 'تم أضافة العضو بنجاح');

    }

    public function editUser ($user_id)
    {

        $selected_user = $this->user->findOrFail($user_id);

        return view('website.users.edit_user' , compact('selected_user'));

    }

    public function updateUser (Request $request , $user_id)
    {


        $this->validate($request , [
            'name' => 'required' ,
            'code' => 'required' ,
            'email' => 'required|email' ,
        ]);

        $user = $this->user->findOrFail($user_id);

        $user->name = $request->input('name');
        $user->code = $request->input('code');
        $user->email = $request->input('email');
        $user->authority = $request->input('authority');
        $user->abilities = ($abilities = $request->input('user_abilities')) ?
                            collect($abilities)->toJson() : null;


        $user->save();

        return redirect(route('users'))->with('success' , 'تم تعديل العضو بنجاح');

    }

    public function deleteUser ($user_id)
    {

        $this->user->findOrFail($user_id)->delete();

        return redirect()->back();

    }

    private function validateUserForm (Request $request) {


        $this->validate($request , [
            'name' => 'required' ,
            'code' => 'required' ,
            'email' => 'required|email|unique:users' ,
            'password' => 'required' ,
            'password_confirmation' => 'required|same:password'
        ]);

    }

}
