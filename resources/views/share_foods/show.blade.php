@extends('layouts.public')
@section('public.content')
<div id="content">
  <div class="pagination-tab">
    <div class="container">
      <div class="row">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Detail</a></li>
          <li class="breadcrumb-item active-breadcrumb">The Coffe House</li>
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
                <img src="assets/img/restaurant/res7.jpg" alt="">
                <div class="ribbon">
                  <p>
                    <span>Sale</span> 50%
                  </p>
                </div>
                <div class="ribbon bookmark">
                  <p>
                    <span>Saved</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-7  col-xs-7 ctn">
              <div class="wrp">
                <div class="item name">
                  <div class="score">
                    <p>8</p>
                  </div>
                  <div class="name-address">
                    <h3> The Coffe House  </h3>
                  </div>
                  <div class="clearfix"> </div>
                </div>
                <p class="item address "><i class="fa fa-location-arrow"></i>123 Bach Dang, Da Nang</p>
                <p class="item price "><i class="fa fa-tag"></i>50.000 - 100.000</p>
                <p class="item phone "><i class="fa fa-phone"></i>0511.65232323</p>
                <p class="item time "><i class="fa fa-clock-o"></i>08:00 - 21:00</p>
                <div class="item features">
                  <form>
                    <div class="item-feature save">
                      <div class="form-group">
                        <input type="submit" class=" btn btn-bg" value="Save" />
                      </div>
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam reprehenderit in voluptate velit esse cillum dolore! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam reprehenderit</p>
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
            <h2>Album</h2>
            <p class="underline"></p>
          </div>
          <div class="ctn-products ctn-main">
            <div class="item-product col-md-3 col-xs-4">
              <div class="wrp-item">
                <div class="img-product">
                  <img class="img" src="assets/img/food/food1.jpg" alt="">
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
                                <img class="img" src="assets/img/restaurant/res5.jpg" alt="">
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
            <div class="item-product col-md-3 col-xs-4">
              <div class="wrp-item">
                <div class="img-product">
                  <img class="img" src="assets/img/restaurant/res2.jpg" alt="">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="" data-toggle="modal" data-target="#modal-img"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item-product col-md-3 col-xs-4">
              <div class="wrp-item">
                <div class="img-product">
                  <img class="img" src="assets/img/food/food3.jpg" alt="">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="" data-toggle="modal" data-target="#modal-img"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item-product col-md-3 col-xs-4">
              <div class="wrp-item">
                <div class="img-product">
                  <img class="img" src="assets/img/restaurant/res4.jpg" alt="">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="" data-toggle="modal" data-target="#modal-img"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item-product col-md-3 col-xs-4">
              <div class="wrp-item">
                <div class="img-product">
                  <img class="img" src="assets/img/restaurant/res6.jpg" alt="">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="" data-toggle="modal" data-target="#modal-img"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item-product col-md-3 col-xs-4">
              <div class="wrp-item">
                <div class="img-product">
                  <img class="img" src="assets/img/food/food5.jpg" alt="">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="" data-toggle="modal" data-target="#modal-img"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item-product col-md-3 col-xs-4">
              <div class="wrp-item">
                <div class="img-product">
                  <img class="img" src="assets/img/food/food7.jpg" alt="">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="" data-toggle="modal" data-target="#modal-img"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item-product col-md-3 col-xs-4">
              <div class="wrp-item">
                <div class="img-product">
                  <img class="img" src="assets/img/restaurant/res5.jpg" alt="">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="" data-toggle="modal" data-target="#modal-img"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="view-more col-md-12 col-xs-12">
              <button class="btn btn-bg" type="submit">View more</button>
            </div>
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
                <div class="wrp-item">
                  <img src="assets/img/slide_banner/hd1.jpg">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="detail.html"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
                <div class="wrp-item">
                  <img src="assets/img/restaurant/res1.jpg">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="detail.html"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
                <div class="wrp-item">
                  <img src="assets/img/food/food1.jpg">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="detail.html"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
                <div class="wrp-item">
                  <img src="assets/img/food/food2.jpg">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="detail.html"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
                <div class="wrp-item">
                  <img src="assets/img/restaurant/res3.jpg">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="detail.html"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
                <div class="wrp-item">
                  <img src="assets/img/restaurant/res4.jpg">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="detail.html"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
                <div class="wrp-item">
                  <img src="assets/img/food/food3.jpg">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="detail.html"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
                <div class="wrp-item">
                  <img src="assets/img/food/food5.jpg">
                  <div class="hover-view">
                    <div class="view">
                      <a class="btn-view" href="detail.html"><i class="fa fa-eye"></i></a>
                    </div>
                  </div>
                </div>
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
            <div class="media input-cmt">
              <div class="media-left">
                <img src="assets/img/user/h5.jpg" class="media-object">
              </div>
              <div class="media-body">
                <h4 class="media-heading">Hieu Tran <small><i>Posted on February 19, 2016</i></small></h4>
                <form action="" class="form-border-color">
                  <div class="form-group">
                    <textarea class="form-control" rows="3" id="cmt"></textarea>
                  </div>
                  <div class="pull-right form-group">
                    <input type="submit" class="btn btn-bg" value="Send">
                  </div>
                </form>
              </div>
            </div>
            <div class="media">
              <div class="media-left">
                <img src="assets/img/user/h5.jpg" class="media-object">
              </div>
              <div class="media-body">
                <h4 class="media-heading">Hieu Tran <small><i>Posted on February 19, 2016</i></small></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
            <div class="media">
              <div class="media-left">
                <img src="assets/img/user/h5.jpg" class="media-object">
              </div>
              <div class="media-body">
                <h4 class="media-heading">Hieu Tran <small><i>Posted on February 19, 2016</i></small></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
