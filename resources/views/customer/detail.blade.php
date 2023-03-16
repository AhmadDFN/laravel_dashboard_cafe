@extends('layouts.template')

@section('title',$title)
@section('page-title',$page)

@section('content')
    <ul class="list-group mb-2 w-75 mx-auto justify-content-center">
        <li class="list-group-item active text-md-center">Berikut Adalah Detail Data Dari Para Customer</li>
        <li class="list-group-item">
            <strong>Kode Customer</strong> : {{ $rsCustomer->cus_kd }}
        </li>
        <li class="list-group-item">
            <strong>Nama Customer</strong> : {{ $rsCustomer->cus_nm }}
        </li>
        <li class="list-group-item">
            <strong>Alamat Customer</strong> : {{ $rsCustomer->cus_alamat. ', ' .$rsCustomer->cus_kota. '.' }}
        </li>
        <li class="list-group-item">
            <strong>Nomor Telepon</strong> : {{ $rsCustomer->cus_telp }}
        </li>
        <li class="list-group-item">
            <strong>Jenis Kelamin</strong> : {{ $rsCustomer->cus_jk == 1 ? 'Laki-Laki' : 'Perempuan' }}
        </li>
        <li class="list-group-item">
            <strong>Status</strong> : {{ $rsCustomer->cus_status == 1 ? 'Masih Hidup' : 'Wafat Walafiat' }}
        </li>
        <li class="list-group-item">
            <strong>Jumlah Point</strong> : {{ $rsCustomer->cus_point }}
        </li>
        <li class="list-group-item">
            <strong>User Id Customer</strong> : {{ $rsCustomer->cus_user_id }}
        </li>
    </ul>
@endsection
