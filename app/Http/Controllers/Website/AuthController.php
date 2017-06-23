<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

use Auth;

class AuthController extends Controller
{

    use ResetsPasswords;

    public function getLogin () {

        /*User::create([
            'name' => 'Mohamed' ,
            'email' => 'prince4moha@gmail.com' ,
            'password' => bcrypt(123) ,
            'authority' => 'admin' ,
            'code' => 100
        ]);*/

        return view('website.login');

    }

    public function postLogin (Request $request) {

        $this->validate($request , [
            'email' => 'required|email' ,
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input('email') ,
            'password' => $request->input('password')
        ] , true)) {

            return redirect(route('home'));

        }else{
            return redirect()->back()->with('failed' , 'من فضلك تأكد من بيانات الدخول');
        }

    }

    public function logout () {

        Auth::logout();

        return redirect(route('get_login'));

    }

    public function showResetForm(Request $request, $token = null)
    {
        if (is_null($token)) {
            return $this->getEmail();
        }

        $email = $request->input('email');

        if (view()->exists('auth.passwords.reset')) {
            return view('auth.passwords.reset')->with(compact('token', 'email'));
        }

        return view('auth.reset')->with(compact('token', 'email'));
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request , [
            'email' => 'required'
        ]);

        $broker = $this->getBroker();

        $response = Password::broker($broker)->sendResetLink(
            $this->getSendResetLinkEmailCredentials($request),
            $this->resetEmailBuilder()
        );

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect(route('get_login'))->with('success', 'لقد تم أرسال رسالة لأستعادة كلمة المرور الخاصة بك على بريدك الألكترونى');
            case Password::INVALID_USER:
            default:
                return redirect()->back()->withErrors(['email' => 'لا يوجد مستخدم لهذا البريد الألكترونى']);
        }

    }

    public function reset(Request $request , User $user)
    {

        $this->validate(
            $request,
            [
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password'
            ]
        );

        $user = $user->where('email' , $request->input('email'))->first();

        $user->password = bcrypt($request->input('password'));

        $user->save();

        return redirect(route('get_login'))->with('success' , 'لقد تم تغيير كلمة المرور الخاصة بك');

    }

}
