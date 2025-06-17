<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
{
    public function index(){
        echo "masuk";
    }
    
    public function showLoginForm()
    {
        return view('portal.login');
    }

    public function doLogin(Request $request){
        
        $credentials = $request->only('email', 'password');

        // Cek login
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/portal-siswa');
        }

        // Jika gagal
        return back()->with('error', 'Email atau password salah.');
    }
}
