<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()){
            return redirect()->route('login_form')->with('msg', 'Username atau Password tidak boleh kosong');
        }

        $user = User::where('email', $request->email)->first();

        if ($user)
        {
            $cekpassword = Hash::check($request->password, $user->password);
            if ($cekpassword == TRUE)
            {
                if($user->member){
                    if($user->member->is_active == false){
                        return redirect()->route('login_form')->with('alert', 'Akun Anda belum di verifikasi oleh Admin');
                    }
                }
                Auth::login($user);
                return redirect()->route('beranda');
            }
            else {
                return redirect()->route('login_form')->with('msg', 'Proses Login anda gagal silahkan pastikan email dan password benar');
            }

        }
        else {
            return redirect()->route('login_form')->with('msg', 'anda belum terdaftar');

        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login_form');

    }

}
