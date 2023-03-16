<?php

namespace App\Http\Controllers;

use App\Models\Tables;
use Illuminate\Http\Request;

class TableCtrl extends Controller
{
    public function index(){
        $data = [
            'title' => 'Meja',
            'page' => 'Data Meja',
            'dtTbl' => Tables::All()
        ];
        return view('table.data', $data);
    }
    
    public function form(Request $req){
        $data = [
            'title' => 'Meja',
            'page' =>'Tambah Data Meja',
            'rsTbl' => Tables::where('id',$req->id_tbl)->first()
        ];
        return view('table.form', $data);
    }
    
    public function save(Request $req){
        $req->validate(
            [
                'mj_no' => 'required|numeric',
                'mj_capacity' => 'required'
            ],
            [
                'mj_no.required' => 'Nomor Meja Tidak Boleh Kosong Seperti Hatimu !',
                'mj_no.numeric' => 'Nomor Meja Harus Berupa Angka !',
                'mj_capacity.required' => 'Kapasitas Meja Harus Di Inputkan !',
            ]
        );

        try {
            //Save
            Tables::updateOrCreate(
                [
                    'id' => $req->input('id_tbl')
                ],
                [
                    'mj_no' => $req->input('mj_no'),
                    'mj_capacity' => $req->input('mj_capacity')
                ],
            );

            //Notif
            $notif = [
                'type' => 'success',
                'text' => 'Data Meja Berhasil Disimpan !'
            ];
        } catch(Exception $err){
            //Notif
            $notif = [
                'type' => 'danger',
                'text' => 'Data Meja Gagal Disimpan !'.$err->getMessage()
            ];            
        }
        return redirect(url('table'))->with($notif);
    }
    
    public function delete($id){
        try {
            //Save
            Tables::where('id',$id)->delete();

            //Notif
            $notif = [
                'type' => 'success',
                'text' => 'Data Meja Berhasil Dihapus !'
            ];
        } catch(Exception $err){
            //Notif
            $notif = [
                'type' => 'danger',
                'text' => 'Data Meja Gagal Dihapus !'.$err->getMessage()
            ];            
        }
        return redirect(url('table'))->with($notif);
    }
}
