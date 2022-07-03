<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:user');
    }
    
    /**
     *パスワードリセットに使われるブローカの取得
    *
    * @return PasswordBroker
    */
    public function broker()
    {
        return Password::broker('users');
    }

    public function showLinkRequestForm()
    {
        return view('user.auth.passwords.email');
    }
    
    public function sendResetLinkEmail(Request $request) 
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    } 

    protected function sendResetLinkResponse($response)
    {
        return view('complete');
    }
}
