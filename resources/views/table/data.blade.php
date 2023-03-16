@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')

    <div class="card-tools text-right mb-2 mr-2">
        <a href="{{ url("table/form") }}" class="btn btn-primary btn-sm">Tambah Data Meja</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="dtCategory" class="dtTable table table-bordered table-hover">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nomor</th>
                    <th>Kapasitas</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtTbl as $rsTbl)
                        <tr>
                            <td>{{ $rsTbl->id }}</td>
                            <td>{{ $rsTbl->mj_no }}</td>
                            <td>{{ $rsTbl->mj_capacity }}</td>
                            <td>
                                <a href="{{ url("table/form/".$rsTbl->id) }}"><i class="text-warning fas fa-edit"></i></a>
                                <a href="{{ url("table/delete/".$rsTbl->id) }}"><i class="text-danger fas fa-trash ml-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div> 
@endsection