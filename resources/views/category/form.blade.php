@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')
    <div class="container w-50">
        <div class="card">
            <div class="card-body">
                <form action="{{ url("category/save") }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cat_nm">Category</label>
                        <input type="hidden" name="id_cat" value="{{ @$rsCat->id }}">
                        <input type="text" class="form-control @error('cat_nm') is-invalid @enderror" name="cat_nm" id="cat_nm" placeholder="Nama Category" value="{{ @$rsCat->cat_nm }}">
                        @error('cat_nm')
                            <div id="cat_nm" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-dark" value="SAVE">
                    </div>
                </form>        
            </div>
        </div>
    </div>
@endsection