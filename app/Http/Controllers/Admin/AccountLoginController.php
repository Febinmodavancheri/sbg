<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AccountLoginController extends Controller
{
    //
    public function accountLogin() {
        return view('admin.accountLogin');
    }

    public function accountLoginPost(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $email = $request->email;
        $password = $request->password;


        if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {
//            $request->session()->regenerate();

            return redirect('account-home');
        }

        return back()->withErrors([
            'credentials' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();

        // Redirect the user to a logout confirmation page or anywhere you prefer
        return redirect()->route('login');
    }

}
