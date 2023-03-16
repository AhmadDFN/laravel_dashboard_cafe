@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')
    <div class="container w-50">
        <div class="card">
            <div class="card-body">
                <form action="{{ url("kitchens/save") }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="kitc_nm">Nama Dapur</label>
                        <input type="hidden" name="id_kitch" value="{{ @$rsKitch->id }}">
                        <input type="text" class="form-control @error('kitc_nm') is-invalid @enderror" name="kitc_nm" id="kitc_nm" placeholder="Nama Dapur" value="{{ @$rsKitch->kitc_nm }}">
                        @error('kitc_nm')
                            <div id="kitc_nm" class="invalid-feedback">
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