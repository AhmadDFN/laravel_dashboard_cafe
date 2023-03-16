<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthCtrl extends Controller
{
    function login()
    {
        // Jika sudah login akan langsung ke Dashboard
        if (Auth::check()) {
            return redirect("/");
        }

        return view('auth.login');
    }

    function cek_login(Request $req)
    {
        // Validasi
        $req->validate(
            [
                "email" => "required",
                "password" => "required"
            ],
            [
                "email.required" => "Maaf email harus diisi !",
                "password.required" => "Maaf password harus diisi !"
            ]
        );

        // Cek Login
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $req->session()->regenerate();
            return redirect('/'); // Dashboard
        }

        // Jika user dan password salah maka Kembali ke form Login
        $mess = [
            "type" => "danger",
            "text" => "Maaf username atau password salah !"
        ];

        return back()->with($mess);
    }

    function registrasi()
    {
        return view("auth.register");
    }

    function save_registrasi(Request $req)
    {
        // Validasi
        $req->validate(
            [
                "name" => "required|max:50",
                "email" => "required",
                "password" => "required|min:8"
            ],
            [
                "name.required" => "Maaf Nama harus diisi !",
                "name.max" => "Maaf nama maximal 50 karakter",
                "email.required" => "Maaf email harus diisi !",
                "password.required" => "Maaf password harus diisi !",
                "password.min" => "Password minimal 8 karakter"
            ]
        );

        try {
            // Save
            User::create([
                "name" => $req->name,
                "email" => $req->email,
                "password" => Hash::make($req->password),
                "level" => "User",
                "status" => 1
            ]);

            $mess = [
                "type" => "success",
                "text" => "Registrasi berhasil , silahkan login !"
            ];
        } catch (Exception $err) {
            $mess = [
                "type" => "danger",
                "text" => "Registrasi gagal !"
            ];
        }

        return redirect("auth/login")->with($mess);
    }

    function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('auth/login');
    }
}
