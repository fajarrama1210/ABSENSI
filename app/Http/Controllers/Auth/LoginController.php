<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // Override the default login behavior to handle inactive users
    protected function authenticated(Request $request, $user)
    {
        if ($user->status !== 'active') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Akun Anda Belum Aktif');
        }

        // Redirect based on user role
        if ($user->hasRole('admin')) {
            return redirect()->route('dashboardAdmin');
        } elseif ($user->hasRole('user')) {
            return redirect()->route('dashboardUser');
        }

        return redirect($this->redirectTo);
    }

    // Override the default failed login response
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->route('login')
            ->withInput($request->only('email'))
            ->with('error', 'Email atau Password tidak sesuai');
    }
}
