@extends('layouts.public')
@section('public.content')
<div id="content">
  <div class="user-profile wrapper-content">
    <div class="container">
      <div class="row wrp-ctn-user">
        <div class="title">
          <h2>User Profile</h2>
          <p class="underline"></p>
        </div>
        <div class="ctn-user ctn-main">
          <div class="row ">
            <div class="avatar-features item-ctn col-md-3">
              <div class="wrp">
                <div class="avatar">
                  <div class="img">
                    <img src="{{ $user->avatar }}" alt="..." />
                    <div class="edit-avatar" data-toggle="modal" data-target="#modal-crop-img">
                      <i class="fa fa-camera"></i>
                    </div>
                  </div>
                </div>
                <div class="features">
                  <nav>
                    <ul class="nav">
                      <li class="active"><a href="{{ route('sharefood.profile.index', ['user' => $user->id]) }}"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                      <li><a href="{{ route('sharefood.profile.changePassword', ['user' => $user->id]) }}"><i class="fa fa-user"></i>Password</a></li>
                      <li><a href="{{ route('sharefood.profile.save', ['user' => $user->id]) }}"><i class="fa fa-bookmark"></i>Saved</a></li>
                      @if(Auth::user()->type == \App\User::TYPES['staff'])
                      <li><a href="{{ route('sharefood.profile.placeOfStaff') }}"><i class="fa fa-bookmark"></i>Your Place</a></li>
                      @endif
                    </ul>
                  </nav>
                </div>
                <div class="wrp-blur"></div>
              </div>
            </div>
            <div class="user-infor item-ctn col-md-9">
              <div class="wrp">
                <form action="{{ route('sharefood.profile.update', ['user' => $user->id]) }}" method="POST" data-toggle="validator" role="form" action="" class="form-infor form-border-color">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="form-group username">
                      <label class="control-label col-sm-3">Email:</label>
                      <div class="col-sm-9 show-username">
                        <input type="text" class="form-control" name="email" id="inputFirstName" placeholder="Email" value="{{ $user->email }}" required>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group first-name">
                      <label class="control-label col-sm-3" for="inputFirstName">First Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="firstname" id="inputFirstName" placeholder="First name" value="{{ $user->firstname }}" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group last-name">
                      <label class="control-label col-sm-3" for="inputLastName">Last Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="lastname" id="inputLastName" placeholder="Last name" value="{{ $user->lastname }}" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">Address:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" name="address" placeholder="Address" value="{{ $user->address }}" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">Day of birth:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" name="date_of_birth" placeholder="Day of birth" value="{{ $user->date_of_birth }}" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">Gender:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" name="gender" placeholder="Gender" value="{{ $user->gender }}" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">Phone:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" name="phone" placeholder="Phone" value="{{ $user->phone }}" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">Prefecture:</label>
                      <div class="col-sm-9">
                        <select name="prefecture_id">
                        @foreach($prefectures as $prefecture)
                          @php
                            $selected = ($prefecture->id == $user->prefecture_id)? 'selected="selected"':'';
                          @endphp
                          <option {{ $selected }} value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                        @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group edit">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-bg pull-right">Edit</button>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="modal-crop-img" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content content">
            <div class="wrp-ctn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit avatar</h4>
                </div>
                <div class="modal-body">
                    <form data-toggle="validator" role="form" name="form" action="{{ route('sharefood.profile.update', ['user' => $user->id]) }}" id="form-search" class="form-horizontal" enctype="multipart/form-data" method="POST">
                        {{csrf_field()}}
                        <div class="image-editor">
                            <div class="cropit-preview"></div>
                            <div class="feature-crop">
                                <div class="col-md-4 col-xs-4 item-feature-crop">
                                    <div class="resize">
                                        <input type="range" class="cropit-image-zoom-input">
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-4 item-feature-crop">
                                    <div class="file btn-bg">
                                        <i class="fa fa-camera"></i>Choose image
                                        <input type="file" name="avatar" class="cropit-image-input btn btn-bg" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-4 item-feature-crop">
                                    <div class="upload">
                                        <i class="fa fa-cloud-upload"></i>
                                        <input type="submit" class="export btn btn-bg" value="Upload" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
