@extends('layouts.public')
@section('public.content')
<div id="content">
  <div class="user-profile wrapper-content advanced-search">
    <div class="container">
      <div class="row wrp-ctn-user">
        <div class="title">
          <h2>Advanced search</h2>
          <p class="underline"></p>
        </div>
        <div class="ctn-user ctn-main">
          <div class="row ">
            <div class="item-ctn col-md-3">
              <div class="wrp">
                <div class="features">
                  <nav>
                    <form action="" class="form-avatar">
                      <ul class="nav">
                        <li class="input-address item">
                          <div class="form-group">
                            <div class="">
                              <input type="text" class="form-control" id="test11" placeholder="Address" value="">
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                        </li>
                        <li class="city item-three item">
                          <div class="form-group wrp-item">
                            <select class="form-control" id="">
                              <option>City</option>
                              <option>Đà Nẵng</option>
                            </select>
                          </div>
                        </li>
                        <li class="type item-three item">
                          <div class="form-group wrp-item">
                            <select class="form-control" id="">
                              <option>Type</option>
                              <option>Ăn vặt</option>
                              <option>Coffee</option>
                              <option>Nhà hàng</option>
                            </select>
                          </div>
                        </li>
                        <li class="button-search item-three item">
                          <div class="wrp-item">
                            <div>
                              <input class="form-control btn btn-bg" type="submit" name="" value="Search">
                            </div>
                          </div>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </form>
                  </nav>
                </div>
                <div class="wrp-blur"></div>
              </div>
            </div>
            <div class="user-infor user-saved item-ctn products col-md-9">
              <div class="wrp">
                <div class="ctn-products">
                  <div class="item-product col-md-4 col-xs-4">
                    <div class="wrp-item">
                      <div class="img-product">
                        <img class="img" src="assets/img/food/food1.jpg" alt="">
                        <div class="hover-view">
                          <div class="view">
                            <a class="btn-view" href="detail.html"><i class="fa fa-eye"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="ctn-product">
                        <div class="info">
                          <h3><a href="detail.html">Highlands Nguyễn Du</a></h3>
                          <p class="address">74 Nguyễn Du Đà Nẵng</p>
                        </div>
                        <div class="parameter">
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-star"></i> 20</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-comment"></i> 100</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-bookmark"></i> 50</p>
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
                  <div class="item-product col-md-4 col-xs-4">
                    <div class="wrp-item">
                      <div class="img-product">
                        <img class="img" src="assets/img/restaurant/res2.jpg" alt="">
                        <div class="hover-view">
                          <div class="view">
                            <a class="btn-view" href=""><i class="fa fa-eye"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="ctn-product">
                        <div class="info">
                          <h3><a href="">Highlands Nguyễn Du</a></h3>
                          <p class="address">74 Nguyễn Du Đà Nẵng</p>
                        </div>
                        <div class="parameter">
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-star"></i> 20</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-comment"></i> 100</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-bookmark"></i> 50</p>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item-product col-md-4 col-xs-4">
                    <div class="wrp-item">
                      <div class="img-product">
                        <img class="img" src="assets/img/food/food3.jpg" alt="">
                        <div class="hover-view">
                          <div class="view">
                            <a class="btn-view" href=""><i class="fa fa-eye"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="ctn-product">
                        <div class="info">
                          <h3><a href="">Highlands Nguyễn Du</a></h3>
                          <p class="address">74 Nguyễn Du Đà Nẵng</p>
                        </div>
                        <div class="parameter">
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-star"></i> 20</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-comment"></i> 100</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-bookmark"></i> 50</p>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item-product col-md-4 col-xs-4">
                    <div class="wrp-item">
                      <div class="img-product">
                        <img class="img" src="assets/img/restaurant/res4.jpg" alt="">
                        <div class="hover-view">
                          <div class="view">
                            <a class="btn-view" href=""><i class="fa fa-eye"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="ctn-product">
                        <div class="info">
                          <h3><a href="">Highlands Nguyễn Du</a></h3>
                          <p class="address">74 Nguyễn Du Đà Nẵng</p>
                        </div>
                        <div class="parameter">
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-star"></i> 20</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-comment"></i> 100</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-bookmark"></i> 50</p>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item-product col-md-4 col-xs-4">
                    <div class="wrp-item">
                      <div class="img-product">
                        <img class="img" src="assets/img/restaurant/res6.jpg" alt="">
                        <div class="hover-view">
                          <div class="view">
                            <a class="btn-view" href=""><i class="fa fa-eye"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="ctn-product">
                        <div class="info">
                          <h3><a href="">Highlands Nguyễn Du</a></h3>
                          <p class="address">74 Nguyễn Du Đà Nẵng</p>
                        </div>
                        <div class="parameter">
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-star"></i> 20</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-comment"></i> 100</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-bookmark"></i> 50</p>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item-product col-md-4 col-xs-4">
                    <div class="wrp-item">
                      <div class="img-product">
                        <img class="img" src="assets/img/food/food5.jpg" alt="">
                        <div class="hover-view">
                          <div class="view">
                            <a class="btn-view" href=""><i class="fa fa-eye"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="ctn-product">
                        <div class="info">
                          <h3><a href="">Highlands Nguyễn Du</a></h3>
                          <p class="address">74 Nguyễn Du Đà Nẵng</p>
                        </div>
                        <div class="parameter">
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-star"></i> 20</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-comment"></i> 100</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-bookmark"></i> 50</p>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item-product col-md-4 col-xs-4">
                    <div class="wrp-item">
                      <div class="img-product">
                        <img class="img" src="assets/img/food/food7.jpg" alt="">
                        <div class="hover-view">
                          <div class="view">
                            <a class="btn-view" href=""><i class="fa fa-eye"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="ctn-product">
                        <div class="info">
                          <h3><a href="">The Coffee House</a></h3>
                          <p class="address">100 Nguyễn Văn Linh, Đà Nẵng</p>
                        </div>
                        <div class="parameter">
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-star"></i> 20</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-comment"></i> 100</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-bookmark"></i> 50</p>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item-product col-md-4 col-xs-4">
                    <div class="wrp-item">
                      <div class="img-product">
                        <img class="img" src="assets/img/restaurant/res5.jpg" alt="">
                        <div class="hover-view">
                          <div class="view">
                            <a class="btn-view" href=""><i class="fa fa-eye"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="ctn-product">
                        <div class="info">
                          <h3><a href="">Highlands Nguyễn Du</a></h3>
                          <p class="address">74 Nguyễn Du Đà Nẵng</p>
                        </div>
                        <div class="parameter">
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-star"></i> 20</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-comment"></i> 100</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-bookmark"></i> 50</p>
                          </div>
                          <div class="clearfix"></div>
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
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
