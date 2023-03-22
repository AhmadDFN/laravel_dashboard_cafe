<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class APIAuthCtrl extends Controller
{
    function getLogin(Request $req)
    {

        // Data JSON dari IONIC
        $login = $req->json()->all();

        // Cek Data User
        $user = User::where("email", $login["email"])->first();

        if ($user) {
            // Cek Password
            if (Hash::check($login["password"], $user->password)) {
                // Get Member
                $member = Customer::where("cus_user_id", $user->id)->first();
                // Jika Password benar
                $mess  = ["error" => 0, "mess" => "Berhasil Login !", "data" => ["user" => collect($user), "member" => collect($member)]];
            } else {
                // Jika Password Salah
                $mess  = ["error" => 1, "mess" => "Password Not Match !", "data" => null];
            }
        } else {
            $mess  = ["error" => 1, "mess" => "Email Not Found !", "data" => null];
        }

        return response()->json($mess);
    }

    function register(Request $req)
    {
        // Data JSON from IONIC
        $reg = $req->json()->all();

        // Validation
        $valid = Validator::make(
            $reg,
            // Rule
            [
                "email" => "email|unique:users,email",
            ],
            // Message Error
            [
                "email.unique" => "Email Sudah Terdaftar !!",
            ]
        );

        if ($valid->fails()) {
            $mess  = ["error" => 1, "mess" => "Email Already Exist !", "data" => null];
        } else {
            // Proses Simpan
            $save = User::create([
                "name" => $reg["name"],
                "email" => $reg["email"],
                "password" => Hash::make($reg["password"]),
                "level" => "User",
                "status" => 1
            ]);

            if ($save) {
                $user = User::where("email", $reg["email"])->first();
                //$user->notify(new WelcomeMail());
                $mess  = ["error" => 0, "mess" => "Registration Success !", "data" => collect($user)];
            } else {
                // Jika Gagal Menyimpan
                $mess  = ["error" => 1, "mess" => "Oops ! Any something wrong !", "data" => null];
            }
        }

        return response()->json($mess);
    }

    function user(Request $req)
    {
        $dtUser = $req->json()->all();

        //Update User
        if ($dtUser["password"]) {
            if ($dtUser["password"] == $dtUser["password2"]) {
                $save = User::where("id", $dtUser["id"])->update([
                    "name" => $dtUser["name"],
                    "password" => Hash::make($dtUser["password"])
                ]);
            } else {
                $save = NULL;
                $salah = true;
            }
        } else {
            $save = User::where("id", $dtUser["id"])->update([
                "name" => $dtUser["name"],
            ]);
        }

        if ($save) {
            //Get Data User
            $user = User::where("id", $dtUser["id"])->first();

            $mess = ["error" => 0, "mess" => "Data User Berhasil di Update !", "data" => ["user" => collect($user)]];
        } else {
            if ($salah) {
                $mess = ["error" => 1, "mess" => "Password 1 dan 2 salah", "data" => null];
            } else {
                $mess = ["error" => 1, "mess" => "Data User Gagal di Update", "data" => null];
            }
        }

        return response()->json($mess);
    }
}
