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
                <form action="{{ route('customers.update',$rsCustomer->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            {{--  KIRI  --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cus_kd">Kode Customer</label>
                                    <input type="text" class="form-control" name="cus_kd" id="cus_kd" placeholder="Kode Customer" value="{{ $rsCustomer->cus_kd }}">
                                </div>
                                <div class="form-group">
                                    <label for="cus_nm">Nama Customer</label>
                                    <input type="text" class="form-control" name="cus_nm" id="cus_nm" placeholder="Nama Customer" value="{{ $rsCustomer->cus_nm }}">
                                </div>
                                <div class="form-group">
                                    <label for="cus_alamat">Alamat Customer</label>
                                    <input type="text" class="form-control" name="cus_alamat" id="cus_alamat" placeholder="Alamat Customer" value="{{ $rsCustomer->cus_alamat }}">
                                </div>
                                <div class="form-group">
                                    <label for="cus_kota">Kota Customer</label>
                                    <input type="text" class="form-control" name="cus_kota" id="cus_kota" placeholder="Kota Customer" value="{{ $rsCustomer->cus_kota }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Jenis Kelamin</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cus_jk" id="l" value="1" {{ $rsCustomer->cus_jk == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="l">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cus_jk" id="p" value="2" {{ $rsCustomer->cus_jk == 2 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="p">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            {{--  KANAN  --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cus_telp">Nomor Telepon</label>
                                    <input type="number" class="form-control" name="cus_telp" id="cus_telp" placeholder="Nomor Telepon" value="{{ $rsCustomer->cus_telp }}">
                                </div>
                                <div class="form-group">
                                    <label for="cus_status" class="form-label">Status</label>
                                    <select class="form-control" name="cus_status" id="cus_status">
                                        <option value="1" {{ $rsCustomer->cus_status == 1 ? "selected" : '' }}>Masih Hidup</option>
                                        <option value="2" {{ $rsCustomer->cus_status == 2 ? "selected" : '' }}>Wafat</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cus_point">Jumlah Point</label>
                                    <input type="number" class="form-control" name="cus_point" id="cus_point" placeholder="Point Awal" value="{{ $rsCustomer->cus_point }}">
                                </div>
                                <div class="form-group">
                                    <label for="cus_user_id">User Id Customers</label>
                                    <input type="number" class="form-control" name="cus_user_id" id="cus_user_id" placeholder="Masukkan Cus User Id" value="{{ $rsCustomer->cus_user_id }}">
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