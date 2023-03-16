@extends('layouts.template')

@section("title",$title)
@section("page-title",$title)

@section('content')
    <div class="card-tools text-right m-2">
        <a href="{{ url("transaction/form") }}" class="btn btn-primary btn-sm">Buat Transaksi</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="dtTrans" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nota</th>
                        <th>Tanggal</th>
                        <th>Kasir</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtTrans as $rsTrans)
                        <tr>
                            <td>{{  $rsTrans->trans_nota }}</td>
                            <td>{{ $rsTrans->trans_tgl }}</td>
                            <td>{{ $rsTrans->name }}</td>
                            <td>{{ $rsTrans->trans_cus_id == 0 ? "Umum" : $rsTrans->cus_nm }}</td>
                            <td class="text-right">{{ number_format($rsTrans->trans_gtotal,0,",",".") }}</td>
                            <td>
                                @if ($rsTrans->status==0)
                                <span class="badge badge-warning">Process</span>
                                @endif
                                @if ($rsTrans->status==1)
                                <span class="badge badge-success">Done</span>
                                @endif
                            </td>
                            <td>
                                @if($rsTrans->status==0)                                                           
                                <a href="{{ url("transaction/".$rsTrans->id."/1") }}"><i class="text-success fas fa-check"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="{{ $dtTrans->previousPageUrl() }}">« Prev</a></li>
                <li class="page-item"><a class="page-link" href="javasscript:void(0)">{{ "Hal : ".$dtTrans->currentPage() }}</a></li>
                {{-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li> --}}
                <li class="page-item"><a class="page-link" href="{{ $dtTrans->nextPageUrl() }}">Next »</a></li>
            </ul>
        </div>
    </div> 
@endsection