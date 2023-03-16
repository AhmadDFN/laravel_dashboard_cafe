@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')
<form action="{{ url("menu/save") }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        @if(@$rsMenu->foto)   
                            @if(file_exists($rsMenu->foto))                         
                                <img class="thumb-menu-big" src="{{ asset(@$rsMenu->foto) }}" alt="{{ @$rsMenu->mn_nama }}">
                            @else
                                <img class="thumb-menu-big" src="{{ asset('images/no-image.webp') }}" alt="{{ @$rsMenu->mn_nama }}">
                            @endif
                        @else
                            <img class="thumb-menu-big" src="{{ asset('images/no-image.webp') }}" alt="{{ @$rsMenu->mn_nama }}">
                        @endif
                        <input type="file" name="foto" id="foto">
                        <input type="hidden" name="old_foto" value="{{ @$rsMenu->foto }}">
                        @error('foto')
                            <div id="foto" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="mn_kd">Kode Menu</label>
                        <input type="hidden" name="id_menu" value="{{ @$rsMenu->id }}">
                        <input type="text" class="form-control @error('mn_kd') is-invalid @enderror" name="mn_kd" id="mn_kd" placeholder="Nama Menu" value="{{ @$rsMenu->mn_kd }}">
                        @error('mn_kd')
                            <div id="mn_kd" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="mn_nama">Nama Menu</label>                        
                        <input type="text" class="form-control @error('mn_nama') is-invalid @enderror" name="mn_nama" id="mn_nama" placeholder="Nama Menu" value="{{ @$rsMenu->mn_nama }}">
                        @error('mn_nama')
                            <div id="mn_nama" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="mn_cat_id">Kategori</label>                        
                        <select class="form-control @error('mn_cat_id') is-invalid @enderror" name="mn_cat_id" id="mn_cat_id">
                            <option value="">- Kategori -</option>
                            @foreach ($dtCat as $rsCat)
                                <option value="{{ $rsCat->id }}" {{ @$rsMenu->mn_cat_id==$rsCat->id ? "selected" : "" }}>{{ $rsCat->cat_nm }}</option>
                            @endforeach
                        </select>
                        @error('mn_cat_id')
                            <div id="mn_cat_id" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>                    
                    <div class="form-group">
                        <label for="mn_harga">Harga</label>                        
                        <input type="number" class="form-control @error('mn_harga') is-invalid @enderror" name="mn_harga" id="mn_harga" placeholder="Harga" value="{{ @$rsMenu->mn_harga }}">
                        @error('mn_harga')
                            <div id="mn_harga" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="mn_satuan">Satuan</label>                        
                        <input type="text" class="form-control @error('mn_satuan') is-invalid @enderror" name="mn_satuan" id="mn_satuan" placeholder="Piring/Tusuk/Biji" value="{{ @$rsMenu->mn_satuan }}">
                        @error('mn_satuan')
                            <div id="mn_satuan" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="mn_stok">Stok</label>                        
                        <select class="form-control @error('mn_stok') is-invalid @enderror" name="mn_stok" id="mn_stok">
                            <option value="A" {{ @$rsMenu->mn_stok=="A" ? "selected" : "" }}>Available</option>
                            <option value="NA" {{ @$rsMenu->mn_stok=="NA" ? "selected" : "" }}>Not Available</option>
                        </select>
                        @error('mn_stok')
                            <div id="mn_stok" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="mn_kitch_id">Kitchen</label>                        
                        <select class="form-control @error('mn_kitc_id') is-invalid @enderror" name="mn_kitc_id" id="mn_kitc_id">
                            <option value="">- Kitchen -</option>
                            @foreach ($dtKitchen as $rsKitchen)
                                <option value="{{ $rsKitchen->id }}" {{ @$rsMenu->mn_kitc_id==$rsKitchen->id ? "selected" : "" }}>{{ $rsKitchen->kitc_nm }}</option>
                            @endforeach
                        </select>
                        @error('mn_kitch_id')
                            <div id="mn_kitc_id" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>                     
                    <div class="form-group">
                        <label for="mn_desc">Deskripsi</label>                        
                        <textarea type="text" class="form-control @error('mn_desc') is-invalid @enderror" name="mn_desc" id="mn_desc" placeholder="Deskripsi">{{ @$rsMenu->mn_desc }}</textarea>
                        @error('mn_desc')
                            <div id="mn_desc" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="SAVE">
                    </div>                     
                </div>
            </div>
        </div>
    </div>    
</form> 
@endsection