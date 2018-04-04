@extends('layouts.admin')
@section('admin.content')
<!-- start: Content -->
<div class="col-md-10 col-sm-11 main ">
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.staffs.index') }}">Staff</a></li>
    <li><a href="">Profile</a></li>
    <li class="active">{{ $staff->fullname }}</li>
  </ol>
  <div class="row profile">
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <img class="img-responsive" src="{{ $staff->avatar }}">
          <h2 class="text-center"><strong>{{ $staff->fullname }}</strong></h2>
          <h4 class="text-center"><small><i class="fa fa-map-marker"></i>{{ $staff->address }}</small></h4>
          <hr>
          <div class="row">
            <div class="col-xs-12">
              <a href="{{ route('admin.staffs.show', ['staff' => $staff->id, 'status' => $staff->status]) }}" title=""><button type="button" class="btn btn-success btn-block">{{ changeStatus($staff->status) }}</button></a>
            </div>
            <!--/.col-->
          </div>
          <!--/.row-->
          <hr>
          <div class="row text-center">
            <div class="col-xs-4">
              <div><strong>{{ $numPlace }}</strong></div>
              <div><small>numPlace</small></div>
            </div>
            <!--/.col-->
            <div class="col-xs-4">
              <div><strong>{{ $numUserFollows }}</strong></div>
              <div><small>Save numUserFollows</small></div>
            </div>
            <!--/.col-->
            <div class="col-xs-4">
              <div><strong>(confirm)</strong></div>
              <div><small>Favorited place</small></div>
            </div>
            <!--/.col-->
          </div>
          <!--/.row-->
          <hr>
          <h4><strong>About {{ $staff->fullname }}</strong></h4>
          <p>{{ $staff->memo }}</p>
          <hr>
          <h4><strong>Contact Information</strong></h4>
          <ul class="profile-details">
            <li>
              <div><i class="fa fa-tablet"></i> mobile phone</div>
              {{ $staff->phone }}
            </li>
            <li>
              <div><i class="fa fa-envelope"></i> e-mail</div>
              {{ $staff->email }}
            </li>
            <li>
              <div><i class="fa fa-map-marker"></i> address</div>
              {{ $staff->address }}
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
            <li><a href="{{ route('admin.staffs.show', ['staff' => $staff->id, 'tab' => 'places']) }}">Place</a></li>
            <li><a href="{{ route('admin.staffs.show', ['staff' => $staff->id, 'tab' => 'followers']) }}">Follow Staff</a></li>
            {{-- <li><a href="{{ route('admin.staffs.show', ['staff' => $staff->id, 'tab' => 'notes']) }}">Save Place</a></li> --}}
          </ul>
        </div>
        @if($tab == 'followers')
        @include('admin.partials.tabs_follows', compact('staff', 'tab'))
        @else
        @include('admin.partials.tabs', compact('staff', 'tab'))
        @endif
      </div>
    </div>
  </div>
  <!--/col-->
</div>
<!-- end: Content -->
@endsection
