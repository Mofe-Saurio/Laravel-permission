<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Para cambiar estado activo una vez pasa el login
    protected function sendLoginResponse(Request $request)
    {
        User::where('id', Auth::user()->id)
            ->update(['is_online' => 1]);

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);


        return $this->authenticated($request, $this->guard()->user())

            ?: redirect()->intended($this->redirectPath());
    }

    //Una vez hace logout, cambia estado 0, desconectado
    public function logout(Request $request)
    {
        User::where('id', Auth::user()->id)
            ->update(['is_online' => 0]);

        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
