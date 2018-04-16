@extends('layouts.public')
@section('public.content')
<div id="content">
  <div class="pagination-tab">
    <div class="container">
      <div class="row">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Detail</a></li>
          <li class="breadcrumb-item active-breadcrumb">{{ $place->name }}</li>
        </ol>
      </div>
    </div>
  </div>
  <div class="detail">
    <div class="information">
      <div class="container">
        <div class="row">
          <div class="infor-main">
            <div class="col-md-5 col-xs-5 image">
              <div class="wrp">
                <img src="{{ $place->image }}" alt="">
                @if($place->discount != 0)
                <div class="ribbon">
                  <p>
                    <span>Sale</span> {{ $place->discount }}%
                  </p>
                </div>
                @endif
                @php
                  if(Auth::user()) {
                    $check = \Auth::user()->notes()->where('place_id',$place->id)->first();
                  }
                @endphp

                @if(!empty($check))
                <div class="ribbon bookmark">
                  <p>
                    <span>Saved</span>
                  </p>
                </div>
                @endif
              </div>
            </div>
            <div class="col-md-7  col-xs-7 ctn">
              <div class="wrp">
                <div class="item name">
                  <div class="score">
                    <p>8</p>
                  </div>
                  <div class="name-address">
                    <h3>{{ $place->name }}</h3>
                  </div>
                  <div class="clearfix"> </div>
                </div>
                <p class="item address "><i class="fa fa-location-arrow"></i>{{ $place->address }}</p>
                <p class="item price "><i class="fa fa-tag"></i>{{ number_format($place->from_price) }} - {{ number_format($place->to_price) }}</p>
                <p class="item phone "><i class="fa fa-phone"></i>{{ $place->phone }}</p>
                <p class="item time "><i class="fa fa-clock-o"></i>{{ $place->start_time }} - {{ $place->end_time }}</p>
                <div class="item features">
                  <div class="item-feature save">
                    @if(!Auth::user())
                      <div class="form-group">
                        <input data-toggle="modal" data-target="#modal-signUp" type="submit" class=" btn btn-bg" name="save" value="Save" />
                      </div>
                    @else
                      <form action="{{ route('sharefood.save') }}" method="POST">
                      {{csrf_field()}}
                        <div class="form-group">
                          @if(!empty($check))
                          <input type="hidden" name="check_save" value="1">
                          @else
                          <input type="hidden" name="check_save" value="0">
                          @endif
                          <input type="hidden" name="place_id" value="{{ $place->id }}">
                          <input type="submit" class=" btn btn-bg" name="save" value="Save" />
                        </div>
                      </form>
                    @endif
                  </div>
                    <div class="item-feature rate">
                      <div class="form-group">
                        <a href="" class="btn btn-bg" data-toggle="modal" data-target="#modal-rating">Rate</a>
                      </div>
                    </div>
                    <div id="modal-rating" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content content">
                          <div class="wrp-ctn">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Rating</h4>
                            </div>
                            <div class="modal-body">
                              <form role="form" name="form-rate" id="form-rate" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                <div class="col-md-12">
                                  <div class="form-group item">
                                    <div class="rating"></div>
                                    <input id="input-rate" type="text">
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group button-action">
                                    <input type="submit" class=" btn btn-bg" value="Send" />
                                  </div>
                                </div>
                                <div class="clearfix"></div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="ggmap">
            <div id="map"></div>
          </div>
          <div class="features"></div>
        </div>
      </div>
    </div>
    <div class="description">
      <div class="wrp-blur wrapper-content">
        <div class="container">
          <div class="row">
            <div class="title">
              <h2>Description</h2>
              <p class="underline"></p>
            </div>
            <div class="ctn-description ctn-main">
              <div class="col-md-8 col-md-push-2">
                <p>{{ $place->description }}</p>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="album products wrapper-content">
      <div class="container">
        <div class="row">
          <div class="title">
            <h2>Foods</h2>
            <p class="underline"></p>
          </div>
          <div class="ctn-products ctn-main">
          @foreach($place->foods as $food)
            <div class="item-product col-md-3 col-xs-4">
              <div class="wrp-item">
                <div class="img-product">
                  <img class="img" src="{{ $food->image}}" alt="">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="" data-toggle="modal" data-target="#modal-img"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                  <div id="modal-img" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content content">
                        <div class="wrp-ctn">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <div class="wrp-item">
                              <div class="img-product">
                                <img class="img" src="{{ $food->image}}" alt="">
                              </div>
                              <div class="detail">
                              <div><span>Name: </span>{{ $food->name }}</div>
                              <div><span>Price: </span>{{ $food->price }}</div>
                              <div><span>Description: </span>{{ $food->description }}</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="other wrapper-content">
      <div class="container">
        <div class="row">
          <div class="wrp">
            <div class="title">
              <h2>Others</h2>
              <p class="underline"></p>
            </div>
            <div class="ctn-slide ctn-main">
              <div class="slider-other slider">
              @foreach($orthers as $orther )
                <div class="wrp-item">
                  <img src="{{ $orther->image }}">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="{{ route('sharefood.show', ['name' => str_slug($orther->name), 'place' => $orther->id]) }}"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
              @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="comments wrapper-content">
      <div class="container">
        <div class="row">
          <div class="title">
            <h2>Comments</h2>
            <p class="underline"></p>
          </div>
          <div class="ctn-comments ctn-main">
            @if(Auth::user())
            <div class="media input-cmt">
              <div class="media-left">
                <img src="{{ Auth::user()->avatar }}" class="media-object">
              </div>
              <div class="media-body">
                <h4 class="media-heading">{{ Auth::user()->firstname }}</h4>
                <form action="{{ route('sharefood.comment') }}" method="POST" class="form-border-color">
                  {{csrf_field()}}
                  <div class="form-group">
                    <input type="hidden" name="place_id" value="{{ $place->id }}">
                    <textarea class="form-control" name="content" rows="3" id="cmt"></textarea>
                  </div>
                  <div class="pull-right form-group">
                    <input type="submit" class="btn btn-bg" name="cmt" value="Send">
                  </div>
                </form>
              </div>
            </div>
            @endif
            @foreach($comments as $comment)
            <div class="media">
              <div class="media-left">
                <img src="{{ $comment->user->avatar }}" class="media-object">
              </div>
              <div class="media-body">
                <h4 class="media-heading">{{ $comment->user->firstname }} <small><i>Posted on {{ $comment->created_at }}</i></small></h4>
                <p>{{ $comment->content }}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
const myLatLng = {
  lat: <?php echo $place->lat; ?>,
  lng: <?php echo $place->lng; ?>
}
</script>
@endsection
