@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')

    <div class="card-tools text-right mb-2 mr-2">
        <a href="{{ url("cus/form") }}" class="btn btn-primary btn-sm">Tambah Customer</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="dtCustomers" class="dtTable table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Point</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $rsCus)
                    <tr>
                        <td>{{ $rsCus->cus_kd }}</td>
                        <td>{{ $rsCus->cus_nm }}</td>
                        <td>{!! $rsCus->cus_alamat.", ".$rsCus->cus_kota."</br>".$rsCus->cus_telp !!}</td>
                        <td>{{ $rsCus->cus_jk==1 ? "Laki-Laki" : "Perempuan" }}</td>
                        <td>{{ $rsCus->cus_status==1 ? "Masih Hidup" : "Wafat" }}</td>
                        <td>{{ $rsCus->cus_point }}</td>
                        <td>
                            <form action="{{ route('customers.destroy',$rsCus->id) }}" method="post">
                                <a href="{{ route('customers.edit',$rsCus->id) }}"><i class="text-warning fas fa-user-edit"></i></a>
                                
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-transparent mt-0"><i class="text-danger fas fa-user-times"></i></button>
                                
                                <a href="{{ route('customers.show',$rsCus->id) }}"><i class="text-primary fas fa-eye"></i></a><br>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div> 
@endsection