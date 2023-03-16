@extends('layouts.template')

@section("title","Dashboard")
@section("page-title","Dashboard")

@section('content')
<!-- Small boxes (Stat box) -->
    {{-- Notif --}}
    @if (session("text"))
        <div class="alert alert-{{ session("type") }}" role="alert">
            {{ session("text") }}
        </div>
    @endif
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ number_format($dailyInc->gtotal,0,",",".") }}</h3>

          <p>Daily Income</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ number_format($monthInc->gtotal,0,",",".") }}</h3>

          <p>Monthly</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ number_format($yearInc->gtotal,0,",",".") }}</h3>

          <p>Yearly</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    
    <!-- ./col -->
  </div>
  <!-- /.row -->
@endsection