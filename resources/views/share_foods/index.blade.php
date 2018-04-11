@extends('layouts.public')
@section('public.content')
<div id="content">
  <div class="home">
    <div class="slide-ad">
      <div class="container-fluid">
        <div class="row">
          <div class="slider-ad slider">
            <div class="wrp-item">
              <img src="share_foods/assets/img/slide_banner/banner1.jpg">
              <div class="bg">
                <div class="slide-text ">
                  <h2>Nutrition Breakfast </h2>
                </div>
              </div>
            </div>
            <div class="wrp-item">
              <img src="share_foods/assets/img/food/food10.jpg">
              <div class="bg">
                <div class="slide-text ">
                  <h2>Fresh Fruit</h2>
                </div>
              </div>
            </div>
            <div class="wrp-item">
              <img src="share_foods/assets/img/slide_banner/banner5.jpg">
              <div class="bg">
                <div class="slide-text ">
                  <h2>Green Tea</h2>
                </div>
              </div>
            </div>
            <div class="wrp-item">
              <img src="share_foods/assets/img/slide_banner/banner2.jpg">
              <div class="bg">
                <div class="slide-text ">
                  <h2>Fresh Vegetables </h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="interested" class="section-scroll products wrapper-content">
      <div class="container">
        <div class="row">
          <div class="title">
            <h2>Interested</h2>
            <p class="underline"></p>
          </div>
          <div class="ctn-products ctn-main">
          @foreach($placeInteresteds as $placeInterested)
            <div class="item-product col-md-3 col-xs-4">
              <div class="wrp-item">
                <div class="img-product">
                  <img class="img" src="{{ $placeInterested->image }}" alt="">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="{{ route('sharefood.show', ['place' => $placeInterested->id]) }}"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
                <div class="ctn-product">
                  <div class="info">
                    <h3><a href="{{ route('sharefood.show', ['place' => $placeInterested->id]) }}">{{ $placeInterested->name }}</a></h3>
                    <p class="address">{{ $placeInterested->address }}</p>
                  </div>
                  <div class="parameter">
                    <div class="col-md-4 col-xs-4">
                      <p href=""><i class="fa fa-star"></i>{{ $placeInterested->favorites_count }}</p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <p href=""><i class="fa fa-comment"></i>{{ $placeInterested->comments_count }}</p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <p href=""><i class="fa fa-bookmark"></i>{{ $placeInterested->saves_count }}</p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                @if($placeInterested->discount != 0)
                <div class="ribbon">
                  <p>
                    <span>Sale</span> {{ $placeInterested->discount }}%
                  </p>
                </div>
                @endif
              </div>
            </div>
          @endforeach
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <div id="news" class="section-scroll products wrapper-content">
      <div class="container">
        <div class="row">
          <div class="title">
            <h2>News</h2>
            <p class="underline"></p>
          </div>
          <div class="ctn-products ctn-main">
          @foreach($placeNews as $placeNew)
            <div class="item-product col-md-3 col-xs-4">
              <div class="wrp-item">
                <div class="img-product">
                  <img class="img" src="{{ $placeNew->image }}" alt="">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href=""><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
                <div class="ctn-product">
                  <div class="info">
                    <h3><a href="">{{ $placeNew->name }}</a></h3>
                    <p class="address">{{ $placeNew->address }}</p>
                  </div>
                  <div class="parameter">
                    <div class="col-md-4 col-xs-4">
                      <p href=""><i class="fa fa-star"></i>{{ $placeNew->favorites_count }}</p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <p href=""><i class="fa fa-comment"></i>{{ $placeNew->comments_count }}</p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                      <p href=""><i class="fa fa-bookmark"></i>{{ $placeNew->saves_count }}</p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                @if($placeNew->discount != 0)
                <div class="ribbon">
                  <p>
                    <span>Sale</span> {{ $placeNew->discount }}%
                  </p>
                </div>
                @endif
              </div>
            </div>
          @endforeach
            <div class="view-more col-md-12 col-xs-12">
              <a href="{{ route('sharefood.all') }}" title=""><button class="btn btn-bg">View more</button></a>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
    <!--About Us-->
    <div id="aboutUs" class="section-scroll products wrapper-content">
      <div class="wrp-ctn container">
        <div class="row">
          <div class="title">
            <h2>About Us</h2>
            <p class="underline"></p>
          </div>
          <div class="ctn-about ctn-products ctn-main">
            <div class="col-md-6 col-md-push-3 class-two">
              <div class="item-product col-md-6 col-xs-4 wow bounceInLeft">
                <div class="wrp-item">
                  <div class="img-product">
                    <img class="img" src="share_foods/assets/img/about-us/h4.jpg" alt="">
                  </div>
                  <div class="ctn-product">
                    <div class="info">
                      <h3 class="name4"><span >Hoài Thương</span></h3>
                      <p class="address">Backend</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item-product col-md-6 col-xs-4 wow bounceInLeft">
                <div class="wrp-item">
                  <div class="img-product">
                    <img class="img" src="share_foods/assets/img/about-us/h5.jpg" alt="">
                  </div>
                  <div class="ctn-product">
                    <div class="info">
                      <h3 class="name5"><span >Hiếu Trần</span></h3>
                      <p class="address">Frontend</p>
                    </div>
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
</div>
@endsection
