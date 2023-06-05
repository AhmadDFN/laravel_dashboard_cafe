<?php

namespace App\Http\Controllers;

use App\Models\Kitchens;
use Exception;
use Illuminate\Http\Request;

class KitchensCtrl extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kitchens',
            'page' => 'Data Kitchens',
            'dtKitch' => Kitchens::All()
        ];
        return view('kitchens.data', $data);
    }

    public function form(Request $req)
    {
        $data = [
            'title' => 'Kitchens',
            'page' => 'Tambah Data Kitchens',
            'rsKitch' => Kitchens::where('id', $req->id_kitch)->first()
        ];
        return view('kitchens.form', $data);
    }

    public function save(Request $req)
    {
        $req->validate(
            [
                'kitc_nm' => 'required|unique:kitchens|max:20'
            ],
            [
                'kitc_nm.required' => 'Nama Dapur Tidak Boleh Kosong !',
                'kitc_nm.unique' => 'Maaf Nama Dapur Sudah Digunakan !',
                'kitc_nm.max' => 'Nama Dapur Maksimal 20 Karakter !',
            ]
        );

        try {
            //Save
            Kitchens::updateOrCreate(
                [
                    'id' => $req->input('id_kitch')
                ],
                [
                    'kitc_nm' => $req->input('kitc_nm')
                ]
            );

            //Notif
            $notif = [
                'type' => 'success',
                'text' => 'Data Dapur Berhasil Disimpan !'
            ];
        } catch (Exception $err) {
            //Notif
            $notif = [
                'type' => 'danger',
                'text' => 'Data Dapur Gagal Disimpan !' . $err->getMessage()
            ];
        }
        return redirect(url('kitchens'))->with($notif);
    }

    public function delete($id)
    {
        try {
            //Save
            Kitchens::where('id', $id)->delete();

            //Notif
            $notif = [
                'type' => 'success',
                'text' => 'Data Dapur Berhasil Dihapus !'
            ];
        } catch (Exception $err) {
            //Notif
            $notif = [
                'type' => 'danger',
                'text' => 'Data Dapur Gagal Dihapus !' . $err->getMessage()
            ];
        }
        return redirect(url('kitchens'))->with($notif);
    }
}
