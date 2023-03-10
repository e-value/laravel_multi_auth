<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = RouteServiceProvider::COMPANY_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:company')->except('logout');
    }

    public function showLoginForm()
    {
        dd("company.showLoginForm");
    }

    protected function guard()
    {
        return Auth::guard('company');
    }

    public function logout(Request $request)
    {
        $this->guard('company')->logout();
        $request->session()->invalidate();
        return redirect('/company/login');
    }
}
