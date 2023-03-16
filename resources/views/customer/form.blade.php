@extends('layouts.template')

@section("title",$title)
@section("page-title",$page)

@section('content')
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">INPUT DATA CUSTOMER YANG AKAN DI TAMBAHKAN</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('customers.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            {{--  KIRI  --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cus_kd">Kode Customer</label>
                                    <input type="text" class="form-control @error('cus_kd') is-invalid @enderror" name="cus_kd" id="cus_kd" placeholder="Kode Customer" value="{{ @old('cus_kd') }}">
                                    @error('cus_kd')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cus_nm">Nama Customer</label>
                                    <input type="text" class="form-control @error('cus_nm') is-invalid @enderror" name="cus_nm" id="cus_nm" placeholder="Nama Customer" value="{{ @old('cus_nm') }}">
                                    @error('cus_nm')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cus_alamat">Alamat Customer</label>
                                    <input type="text" class="form-control @error('cus_nm') is-invalid @enderror" name="cus_alamat" id="cus_alamat" placeholder="Alamat Customer" value="{{ @old('cus_alamat') }}">
                                    @error('cus_alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cus_kota">Kota Customer</label>
                                    <input type="text" class="form-control @error('cus_kota') is-invalid @enderror" name="cus_kota" id="cus_kota" placeholder="Kota Customer" value="{{ @old('cus_kota') }}">
                                    @error('cus_kota')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Jenis Kelamin</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cus_jk" id="l" value="1">
                                        <label class="form-check-label" for="l">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cus_jk" id="p" value="2">
                                        <label class="form-check-label" for="p">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            {{--  KANAN  --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cus_telp">Nomor Telepon</label>
                                    <input type="number" class="form-control @error('cus_telp') is-invalid @enderror" name="cus_telp" id="cus_telp" placeholder="Nomor Telepon" value="{{ @old('cus_telp') }}">
                                    @error('cus_telp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cus_status" class="form-label">Status</label>
                                    <select class="form-control" name="cus_status" id="cus_status">
                                        <option value="1">Masih Hidup</option>
                                        <option value="2">Wafat</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cus_point">Jumlah Point</label>
                                    <input type="number" class="form-control @error('cus_point') is-invalid @enderror" name="cus_point" id="cus_point" placeholder="Point Awal" value="{{ @old('cus_point') }}">
                                    @error('cus_point')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cus_user_id">User Id Customers</label>
                                    <input type="number" class="form-control @error('cus_user_id') is-invalid @enderror" name="cus_user_id" id="cus_user_id" placeholder="Masukkan Cus User Id" value="{{ @old('cus_user_id') }}">
                                    @error('cus_user_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <!-- /.card -->
@endsection