<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    protected function authenticated()
    {
        if (Auth::user()->role_as == '1') //1 = Admin Login
        {
            // TODO : Change Routes To route(NAME)
            return redirect('/dashboard')->with('status', 'Welcome to your dashboard');
        } elseif (Auth::user()->role_as == '0') // Normal or Default User Login
        {
            return redirect('/home')->with('status', 'Logged in successfully');
        }
    }
    // THis is for Overring Bwlow Bleow

    public function username()
    {
        $login = request()->input('username');

        if (is_numeric($login)) {
            $field = 'phone';
        } else {
            $field = 'email';
        }

        request()->merge([$field => $login]);

        return $field;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationValidationException::withMessages([
            'username' => [trans('auth.failed')],
        ]);
    }
}
