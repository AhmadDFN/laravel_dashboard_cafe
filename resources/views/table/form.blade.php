@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')
    <div class="container w-50">
        <div class="card">
            <div class="card-body">
                <form action="{{ url("table/save") }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="mj_no">Nomor Meja</label>
                        <input type="hidden" name="id_tbl" value="{{ @$rsTbl->id }}">
                        <input type="text" class="form-control @error('mj_no') is-invalid @enderror" name="mj_no" id="mj_no" placeholder="Nomor Meja" value="{{ @$rsTbl->mj_no }}">
                        @error('mj_no')
                            <div id="mj_no" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="mj_capacity">Kapasitas Meja</label>
                        <input type="hidden" name="id_tbl" value="{{ @$rsTbl->id }}">
                        <input type="text" class="form-control @error('mj_capacity') is-invalid @enderror" name="mj_capacity" id="mj_capacity" placeholder="Kapasitas Meja" value="{{ @$rsTbl->mj_capacity }}">
                        @error('mj_capacity')
                            <div id="mj_capacity" class="invalid-feedback">
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