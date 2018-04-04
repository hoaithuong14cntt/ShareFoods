@extends('layouts.admin')
@section('admin.content')
<!-- start: Content -->
<div class="col-md-10 col-sm-11 main ">
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.places.index') }}">Place</a></li>
    <li><a href="">Detail</a></li>
    <li class="active">{{ $place->name }}</li>
  </ol>
  <div class="row profile">
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <img class="img-responsive" src="{{ $place->image }}">
          <h2 class="text-center"><strong>{{ $place->fullname }}</strong></h2>
          <h4 class="text-center"><small><i class="fa fa-map-marker"></i>{{ $place->address }}</small></h4>
          <hr>
          <div class="row">
            <div class="col-xs-12">
              <a href="{{ route('admin.places.show', ['place' => $place->id, 'status' => $place->is_published]) }}" title=""><button type="button" class="btn btn-success btn-block">{{ chanePublished($place->is_published) }}</button></a>
            </div>
            <!--/.col-->
          </div>
          <!--/.row-->
          <hr>
          <div class="row text-center">
            <div class="col-xs-4">
              <div><strong>{{ $place->comments_count }}</strong></div>
              <div><small>Comments</small></div>
            </div>
            <!--/.col-->
            <div class="col-xs-4">
              <div><strong>{{ $place->saves_count }}</strong></div>
              <div><small>User Save</small></div>
            </div>
            <!--/.col-->
            <div class="col-xs-4">
              <div><strong>{{ $place->favorites_count }}</strong></div>
              <div><small>User Favorited</small></div>
            </div>
            <!--/.col-->
          </div>
          <!--/.row-->
          <hr>
          <h4><strong>About {{ $place->name }}</strong></h4>
          <p>{{ $place->description }}</p>
          <hr>
          <h4><strong>Contact Information</strong></h4>
          <ul class="profile-details">
            <li>
              <div><i class="fa fa-tablet"></i> mobile phone</div>
              {{ $place->phone }}
            </li>
            <li>
              <div><i class="fa fa-envelope"></i>Discount</div>
              {{ $place->discount }}
            </li>
            <li>
              <div><i class="fa fa-map-marker"></i> address</div>
              {{ $place->address }}
            </li>
            <li>
              <div><i class="fa fa-map-marker"></i> Time</div>
              {{ $place->start_time }} > {{ $place->end_time }}
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!--/.col-->
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <ul class="nav nav-tabs pull-left" id="tabs">
            <li><a href="{{ route('admin.places.show', ['place' => $place->id, 'tab' => 'favorites']) }}">User Favorited</a></li>
            <li><a href="{{ route('admin.places.show', ['place' => $place->id, 'tab' => 'cmt']) }}">Comments</a></li>
            <li><a href="{{ route('admin.places.show', ['place' => $place->id, 'tab' => 'saves']) }}">User Save</a></li>
          </ul>
        </div>
        @if($tab == 'cmt')
        @include('admin.partials.tabs_place', compact('place', 'tab'))
        @else
        @include('admin.partials.tabs_follows_place', compact('place', 'tab'))
        @endif
      </div>
    </div>
  </div>
  <!--/col-->
</div>
<!-- end: Content -->
@endsection
