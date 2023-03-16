<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use PDOException;

class CustomersCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'num' => 1,
            'title' => 'Customers',
            'page' => 'Data Customers',
            'customers' => Customer::All()
        ];
        return view('customer.customers', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'num' => 1,
            'title' => "Customers",
            'page' => "Form Input Data",
            'pos' => 'New'
        ];
        return view('customer.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validasi Data
        $request->validate(
            [
                'cus_kd' => 'required|max:10|unique:customers',
                'cus_nm' => 'required|min:5|max:50',
                'cus_alamat' => 'min:5|max:100',
                'cus_kota' => 'min:5|max:20',
                'cus_telp' => 'required|numeric|digits_between:11,12',
                'cus_point' => 'numeric',
                'cus_user_id' => 'required|numeric'
            ],
            [
                'cus_kd.required' => 'Kode Customer harus di isi !',
                'cus_kd.max' => 'Kode maximal adalah 10 Karakter !',
                'cus_kd.unique' => 'Kode Customer sudah digunakan !',
                'cus_nm.required' => 'Nama Customer harus di isi !',
                'cus_nm.min' => 'Nama Customer minimal harus 5 karakter !',
                'cus_nm.max' => 'Nama Customer maximal 50 karakter !',
                'cus_alamat.min' => 'Alamat Customer minimal 5 karakter !',
                'cus_alamat.max' => 'Alamat Customer maximal 100 karakter !',
                'cus_kota.min' => 'Kota Customer minimal 5 karakter !',
                'cus_kota.max' => 'Kota Customer maximal 20 karakter !',
                'cus_telp.required' => 'Nomor Customer tidak boleh kosong !',
                'cus_telp.numeric' => 'Nomor Customer Harus berupa angka !',
                'cus_telp.digits_between' => 'Nomor Customer minimal 11 & maximal 12 karakter !',
                'cus_point.numeric' => 'Point Customer Harus berupa angka !',
                // 'cus_point.max' => 'Point Customer Makximal 8 digit point !',
                'cus_user_id.required' => 'User Id tidak boleh kosong !',
                'cus_user_id.numeric' => 'User Id tidak harus berupa angka !',
                // 'cus_user_id.max' => 'User Id maksimal 8 digit !'
            ]
        );

        $data = $request->except(['_token']);

        try {
            Customer::create($data);
            $mess = [
                'text' => 'Data Customer BERHASIL disimpan !',
                'type' => 'success'
            ];
        } catch (PDOException $err) {
            $mess = [
                'text' => 'Data Customer GAGAL disimpan !' . $err->getMessage(),
                'type' => 'danger'
            ];
        }

        return redirect()->route('customers.index')->with($mess);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'num' => 1,
            'title' => 'Customers',
            'page' => 'Detail Data Customer',
            'rsCustomer' => Customer::where('id', $id)->first()
        ];

        return view('customer.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'num' => 1,
            'title' => 'Customers',
            'page' => 'Edit Data Customer',
            'rsCustomer' => Customer::where('id', $id)->first()
        ];

        return view('customer.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        try {
            Customer::where('id', $id)->update($data);
            $mess = [
                'text' => 'Data Customer BERHASIL Diubah !',
                'type' => 'success'
            ];
        } catch (PDOException $err) {
            $mess = [
                'text' => 'Data Customer GAGAL Diubah !' . $err->getMessage(),
                'type' => 'danger'
            ];
        }
        //$data = $request->all();

        // Customer::where('id',$id)->update([
        //     'cus_kd' => $data['cus_kd'],
        //     'cus_nm' => $data['cus_nm'],
        //     'cus_alamat' => $data['cus_alamat'],
        //     'cus_kota' => $data['cus_kota'],
        //     'cus_jk' => $data['cus_jk'],
        //     'cus_telp' => $data['cus_telp'],
        //     'cus_status' => $data['cus_status'],
        //     'cus_point' => $data['cus_point'],
        //     'cus_user_id' => $data['cus_user_id'],
        // ]);

        return redirect()->route('customers.index')->with($mess);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Customer::where('id', $id)->delete();
            $mess = [
                'text' => 'Data Customer BERHASIL Dihapus !',
                'type' => 'success'
            ];
        } catch (PDOException $err) {
            $mess = [
                'text' => 'Data Customer GAGAL Dihapus !' . $err->getMessage(),
                'type' => 'danger'
            ];
        }

        return redirect()->route('customers.index')->with($mess);
    }
}
