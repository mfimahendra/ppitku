<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function login(){
        return view('admin.admin-login');
    }

    public function loginPost(Request $request)
    {
        $credential = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            $admin = User::where('username', $request->username)->first();            

            return redirect(route('admin.news'));            
        } else {
            return redirect(route('login'))->with([
                'error' => "Tidak bisa login!",
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect(route('landingPage.index'));
    }
}
