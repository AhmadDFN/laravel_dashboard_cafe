<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryCtrl extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Category',
            'page' => 'Data Category',
            'dtCat' => Category::All()
        ];
        return view('category.data', $data);
    }

    public function form(Request $req)
    {
        $data = [
            'title' => 'Category',
            'page' => 'Form Tambah Category',
            'rsCat' => Category::where('id', $req->id_cat)->first()
        ];
        return view('category.form', $data);
    }

    public function save(Request $req)
    {
        $req->validate(
            [
                'cat_nm' => 'required|unique:categories|max:20'
            ],
            [
                'cat_nm.required' => 'Nama Kategori Tidak Boleh Kosong !',
                'cat_nm.unique' => 'Maaf Nama Kategori Sudah Digunakan !',
                'cat_nm.max' => 'Nama Kategori Maksimal 20 Karakter !',
            ]
        );

        try {
            //Save
            Category::updateOrCreate(
                [
                    'id' => $req->input('id_cat')
                ],
                [
                    'cat_nm' => $req->input('cat_nm')
                ]
            );

            //Notif
            $notif = [
                'type' => 'success',
                'text' => 'Kategori Berhasil Disimpan !'
            ];
        } catch (Exception $err) {
            //Notif
            $notif = [
                'type' => 'danger',
                'text' => 'Kategori Gagal Disimpan !' . $err->getMessage()
            ];
        }
        return redirect(url('category'))->with($notif);
    }

    public function delete($id)
    {
        try {
            //Save
            Category::where('id', $id)->delete();

            //Notif
            $notif = [
                'type' => 'success',
                'text' => 'Kategori Berhasil Dihapus !'
            ];
        } catch (Exception $err) {
            //Notif
            $notif = [
                'type' => 'danger',
                'text' => 'Kategori Gagal Dihapus !' . $err->getMessage()
            ];
        }
        return redirect(url('category'))->with($notif);
    }
}
