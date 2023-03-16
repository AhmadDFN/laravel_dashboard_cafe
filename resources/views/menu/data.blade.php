@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')

    <div class="card-tools text-right m-2">
        <a href="{{ url("menu/form") }}" class="btn btn-primary btn-sm">Tambah Data Menu</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="dtMenu" class="dtTable table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtMenu as $rsMenu)
                        <tr>
                            <td>
                                @if($rsMenu->foto!="")                                
                                    <img class="thumb-menu" src="{{ asset($rsMenu->foto) }}" alt="{{ $rsMenu->mn_nama }}">
                                @else
                                    <img class="thumb-menu" src="{{ asset('images/no-image.webp') }}" alt="{{ $rsMenu->mn_nama }}">
                                @endif
                            </td>
                            <td><strong>{{ $rsMenu->mn_nama }}</strong><br/>{{ $rsMenu->mn_desc }}</td>
                            <td>{{ number_format($rsMenu->mn_harga,0,",",".") }} / {{ $rsMenu->mn_satuan }}</td>
                            <td>
                                @if ($rsMenu->mn_stok=="A")
                                <span class="badge badge-success">Available</span>
                                @else
                                <span class="badge badge-danger">Not Available</span>
                                @endif
                            </td>
                            <td>                                                            
                                <a href="{{ url("menu/form/".$rsMenu->id) }}"><i class="text-warning fas fa-edit"></i></a>
                                <a href="{{ url("menu/delete/".$rsMenu->id) }}"><i class="text-danger fas fa-trash-alt"></i></a><br>
                                <a href="{{ url("menu/detail",$rsMenu->id) }}"><i class="text-primary fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div> 
@endsection