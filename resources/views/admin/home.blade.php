@extends('admin.layaut')

@section('title','DASHBOARD')

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-6">
      <div class="card">
        <div class="card-header">
          <h4>Line &amp; Column Chart</h4>
        </div>
        <div class="card-body">
          <div class="recent-report__chart">
            <div id="chart5"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-6">
      <div class="card">
        <div class="card-header">
          <h4>Pie Chart</h4>
        </div>
        <div class="card-body">
          <div class="recent-report__chart">
            <div id="chart7"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
