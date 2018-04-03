@extends('layouts.admin')
@section('admin.content')
<!-- start: Content -->
<div class="col-md-10 col-sm-11 main ">
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.users.index') }}">User</a></li>
    <li><a href="">Profile</a></li>
    <li class="active">{{ $user->fullname }}</li>
  </ol>
  <div class="row profile">
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <img class="img-responsive" src="{{ $user->avatar }}">
          <h2 class="text-center"><strong>{{ $user->fullname }}</strong></h2>
          <h4 class="text-center"><small><i class="fa fa-map-marker"></i>{{ $user->address }}</small></h4>
          <hr>
          <div class="row">
            <div class="col-xs-12">
              <a href="{{ route('admin.users.show', ['user' => $user->id, 'status' => $user->status]) }}" title=""><button type="button" class="btn btn-success btn-block">{{ changeStatus($user->status) }}</button></a>
            </div>
            <!--/.col-->
          </div>
          <!--/.row-->
          <hr>
          <div class="row text-center">
            <div class="col-xs-4">
              <div><strong>{{ $numFollowStaff }}</strong></div>
              <div><small>Followers</small></div>
            </div>
            <!--/.col-->
            <div class="col-xs-4">
              <div><strong>{{ $numSave }}</strong></div>
              <div><small>Save place</small></div>
            </div>
            <!--/.col-->
            <div class="col-xs-4">
              <div><strong>{{ $numFavorite }}</strong></div>
              <div><small>Favorited place</small></div>
            </div>
            <!--/.col-->
          </div>
          <!--/.row-->
          <hr>
          <h4><strong>About {{ $user->fullname }}</strong></h4>
          <p>{{ $user->memo }}</p>
          <hr>
          <h4><strong>Contact Information</strong></h4>
          <ul class="profile-details">
            <li>
              <div><i class="fa fa-tablet"></i> mobile phone</div>
              {{ $user->phone }}
            </li>
            <li>
              <div><i class="fa fa-envelope"></i> e-mail</div>
              {{ $user->email }}
            </li>
            <li>
              <div><i class="fa fa-map-marker"></i> address</div>
              {{ $user->address }}
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
            <li><a href="{{ route('admin.users.show', ['user' => $user->id, 'tab' => 'favorites']) }}">Favorited Place</a></li>
            <li><a href="{{ route('admin.users.show', ['user' => $user->id, 'tab' => 'follows']) }}">Follow Staff</a></li>
            <li><a href="{{ route('admin.users.show', ['user' => $user->id, 'tab' => 'notes']) }}">Save Place</a></li>
          </ul>
        </div>
        @if($tab == 'follows')
        @include('admin.partials.tabs_follows', compact('user', 'tab'))
        @else
        @include('admin.partials.tabs', compact('user', 'tab'))
        @endif
      </div>
    </div>
  </div>
  <!--/col-->
</div>
<!-- end: Content -->
@endsection
