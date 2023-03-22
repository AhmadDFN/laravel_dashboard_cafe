<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class APICustomerCtrl extends Controller
{
    function save_member(Request $req)
    {
        $dtMember =  $req->json()->all();
        //  return json_encode($dtMember);
        $kode = $dtMember["cus_kd"] ? $dtMember["cus_kd"] : "CSTMR" . Str::upper(Str::random(5)); // Random Text

        // Proses Simpan
        //  Update Data Member
        $save = Customer::UpdateorCreate(
            [
                "id" => $dtMember["id"]
            ],
            [
                "cus_kd" => $kode,
                "cus_nm" => $dtMember["cus_nm"],
                "cus_alamat" => $dtMember["cus_alamat"],
                "cus_kota" => $dtMember["cus_kota"],
                "cus_telp" => $dtMember["cus_telp"],
                "cus_jk" => $dtMember["cus_jk"],
                "cus_user_id" => $dtMember["cus_user_id"]
            ]
        );

        // Cek apakah berhasil disimpan        
        if ($save) {
            // Update nama di tabel user
            User::where("id", $dtMember["cus_user_id"])->update([
                "name" => $dtMember["cus_nm"]
            ]);
            // Get Data User and Member
            $user = User::where("id", $dtMember["cus_user_id"])->first();
            $member = Customer::where("cus_kd", $kode)->first();

            // Memberikan pesan , apakah member baru atu update data
            if ($dtMember["id"] == null) {
                $mess  = ["error" => 0, "mess" => "Selamat Anda Menjadi Member !", "data" => ["user" => collect($user), "member" => collect($member)]];
            } else {
                $mess  = ["error" => 0, "mess" => "Data Updated !", "data" => ["user" => collect($user), "member" => collect($member)]];
            }
        } else {
            $mess  = ["error" => 1, "mess" => "Oops ! Any something wrong !", "data" => null];
        }

        return response()->json($mess);
    }
}
