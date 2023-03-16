@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')

    <div class="card-tools text-right mb-2 mr-2">
        <a href="{{ url("kitchens/form") }}" class="btn btn-primary btn-sm">Tambah Data Dapur</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="dtCategory" class="dtTable table table-bordered table-hover">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nama Dapur</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtKitch as $rsKitch)
                        <tr>
                            <td>{{ $rsKitch->id }}</td>
                            <td>{{ $rsKitch->kitc_nm }}</td>
                            <td>
                                <a href="{{ url("kitchens/form/".$rsKitch->id) }}"><i class="text-warning fas fa-edit"></i></a>
                                <a href="{{ url("kitchens/delete/".$rsKitch->id) }}"><i class="text-danger fas fa-trash ml-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div> 
@endsection