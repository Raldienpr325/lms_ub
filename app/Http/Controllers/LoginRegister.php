<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginRegister extends Controller
{
    public function register_mhs(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Simpan data pengguna ke dalam database
       $create =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Redirect ke halaman yang sesuai setelah pendaftaran sukses
       if($create){
            // return view('auth.login');
            dd('berhasil buat');
       }else{
            dd('ggal');
       }
    }
    public function login_mhs(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        } else {
            return redirect()->back();
        }
    }

}
