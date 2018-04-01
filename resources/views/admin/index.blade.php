@extends('layouts.admin')
@section('admin.content')
<div class="col-md-10 col-sm-11 main ">
  <div class="row">
    <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
      <div class="smallstat">
        <div class="boxchart-overlay blue">
          <div class="image-icon"><i class="fa fa-users"></i></div>
        </div>
        <span class="value">{{ $countNewUsers }}</span>
        <span class="title">Clients</span>
      </div>
    </div>
    <!--/col-->
    <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
      <div class="smallstat">
        <div class="linechart-overlay red">
          <div class="image-icon"><i class="fa fa-map-marker"></i></div>
        </div>
        <span class="value">{{ $countNewPlaces }}</span>
        <span class="title">Place</span>
      </div>
    </div>
    <!--/col-->
    <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
      <div class="smallstat">
        <i class="fa fa-usd green"></i>
        <span class="value">$1 999,99</span>
        <span class="title">Income</span>
      </div>
    </div>
    <!--/col-->
    <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
      <div class="smallstat">
        <div class="piechart-overlay blue">
          <div class="piechart" data-percent="55"><span>55</span>%</div>
        </div>
        <span class="value">$19 999,99</span>
        <span class="title">Account</span>
      </div>
    </div>
    <!--/col-->
  </div>
  <!--/row-->
</div>
@endsection
