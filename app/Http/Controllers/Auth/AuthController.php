<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->redirectAfterLogout = route('auth.login');
        $this->redirectTo = route('backend.dashboard');
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }
}
