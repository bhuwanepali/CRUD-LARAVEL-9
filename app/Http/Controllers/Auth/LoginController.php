<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        # getting input value 
        $username = request('username');

        # checking if its an email or just text
        $this->username = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        # merging values
        request()->merge([$this->username => $username]);

        # returning login type
        return property_exists($this, 'username') ? $this->username : 'email';
    }
}
