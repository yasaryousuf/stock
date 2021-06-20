<?php


namespace App\Http\Controllers\CustomAuth;


use App\Helper\ResponseMessageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController  extends Controller
{
    public function showLoginPage()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $loginRequest)
    {
        try {
            if (Auth::attempt($loginRequest->only('email', 'password'))) {
                return redirect()->intended('dashboard');
            }
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return Redirect::to("login")->withSuccess(ResponseMessageHelper::$response_message['invalid_credential']);
    }

    public function logout() {
        try {
            Session::flush();
            Auth::logout();
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }
        return Redirect('login');
    }

}
