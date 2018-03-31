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
                      <li><a href="{{ route('sharefood.profile.index', ['user' => $user->id]) }}"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                      <li><a href="{{ route('sharefood.profile.changePassword', ['user' => $user->id]) }}"><i class="fa fa-user"></i>Password</a></li>
                      <li class="active"><a href="{{ route('sharefood.profile.save', ['user' => $user->id]) }}"><i class="fa fa-bookmark"></i>Saved</a></li>
                    </ul>
                  </nav>
                </div>
                <div class="wrp-blur"></div>
              </div>
            </div>
            <div class="user-infor user-saved item-ctn products col-md-9">
              <div class="wrp">
                <div class="ctn-products">
                @foreach($places as $place)
                  <div class="item-product col-md-4 col-xs-4">
                    <div class="wrp-item">
                      <div class="img-product">
                        <img class="img" src="{{ $place->image }}" alt="">
                        <div class="hover-view">
                          <div class="view">
                            <a class="btn-view" href="{{ route('sharefood.show', ['place' => $place->id]) }}"><i class="fa fa-eye"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="ctn-product">
                        <div class="info">
                          <h3><a href="{{ route('sharefood.show', ['place' => $place->id]) }}">{{ $place->name }}</a></h3>
                          <p class="address">{{ $place->address }}</p>
                        </div>
                        <div class="parameter">
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-star"></i>{{ $place->favorites_count }}</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-comment"></i>{{ $place->comments_count }}</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-bookmark"></i>{{ $place->saves_count }}</p>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                      <div class="ribbon">
                        <p>
                          <span>Sale</span> 50%
                        </p>
                      </div>
                    </div>
                  </div>
                @endforeach
                  <div class="view-more col-md-12 col-xs-12">
                    <button class="btn btn-bg" type="submit">View more</button>
                  </div>
                  <div class="clearfix"></div>
                </div>
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
