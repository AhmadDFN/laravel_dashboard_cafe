<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kitchens;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class MenuCtrl extends Controller
{
    function index()
    {
        // Response list data 

        $data = [
            "title" => "Menu",
            'page' => 'Data Menu iRzellACafe',
            "dtMenu" => Menu::All()
        ];

        return view("menu.data", $data);
    }

    function form(Request $req)
    {

        $data = [
            "title" => "Menu",
            'page' => 'Form Data Menu',
            "dtCat" => Category::All(),
            "dtKitchen" => Kitchens::All(),
            "rsMenu" => Menu::where("id", $req->id_menu)->first(),

        ];

        return view("menu.form", $data);
    }

    function save(Request $req)
    {
        // Validasi
        $req->validate(
            [
                "mn_kd" => "required|unique:menus,mn_kd," . $req->input("id_menu") . "|max:5",
                "mn_nama" => "required|max:50",
                "mn_cat_id" => "required",
                "mn_harga" => "required|numeric",
                "mn_satuan" => "required|max:20",
                "mn_stok" => "required",
                "mn_kitc_id" => "required",
                // "foto"   => "mimes:jpg,jpeg,png|max:8024"
            ],
            [
                "mn_kd.required" => "Kode Menu Wajib diisi !",
                "mn_kd.unique" => "Kode Sudah digunakan",
                "mn_kd.max" => "Kode maximal 5 Karakter",
                "mn_nama.required" => "Nama Wajib diisi !",
                "mn_nama.max" => "Nama maximal 50 Karaker !",
                "mn_harga.max" => "Harga wajib diisi !",
                "mn_harga.numeri" => "Harga harus berupa angka",
                "mn_satuan.required" => "Satuan wajib diisi !",
                "mn_satuan.max" => "Satuan maimal 20 karakter !",
                "mn_stok.required" => "Stok wajib diisi !",
                "mn_kitc_id.required" => "Dapur wajib diisi !",
                // "foto.mimes" => "Foto harus .jpg, .jpeg atau png !",
                // "foto.max" => "Foto maximal ukuran 1 MB !",
            ]
        );

        // Proses Upload
        // dd($req->file("foto"));

        if ($req->file("foto")) {
            $fileName = time() . '.' . $req->file("foto")->extension();
            $result = $req->file("foto")->move(public_path('uploads/menu'), $fileName);
            $foto = "uploads/menu/" . $fileName;
        } else {
            $foto = $req->input("old_foto");
        }



        // Proses Simpan
        try {
            // Save
            Menu::updateOrCreate(
                [
                    "id" => $req->input("id_menu")
                ],
                [
                    "mn_kd" => $req->input("mn_kd"),
                    "mn_nama" => $req->input("mn_nama"),
                    "mn_cat_id" => $req->input("mn_cat_id"),
                    "mn_harga" => $req->input("mn_harga"),
                    "mn_satuan" => $req->input("mn_satuan"),
                    "mn_stok" => $req->input("mn_stok"),
                    "mn_kitc_id" => $req->input("mn_kitc_id"),
                    "mn_desc" => $req->input("mn_desc"),
                    "foto" => $foto,
                ]
            );

            // Notif 
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan !"
            ];
        } catch (Exception $err) {
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Disimpan !" . $err->getMessage()
            ];
        }

        return redirect('menu')->with($notif);
    }

    function delete($id)
    {
        // Delete Data
        try {
            // Save
            Menu::where("id", $id)->delete();

            // Notif 
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Dihapus !"
            ];
        } catch (Exception $err) {
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Dihapus !" . $err->getMessage()
            ];
        }

        return redirect('menu')->with($notif);
    }
}
