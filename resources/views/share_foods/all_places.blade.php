@extends('layouts.public')
@section('public.content')
<div id="content">
  <div class="user-profile wrapper-content advanced-search all-products">
    <div class="container">
      <div class="row wrp-ctn-user">
        <div class="title">
          <h2>All Products</h2>
          <p class="underline"></p>
        </div>
        <div class="ctn-user ctn-main">
          <div class="row ">
            <div class="item-ctn col-md-3">
              <div class="wrp">
                <div class="features">
                  <nav>
                    <form action="{{ route('sharefood.all') }}" method="get" class="form-avatar">
                      <ul class="nav">
                        <li class="type item">
                          <div class="form-group wrp-item">
                            <select class="form-control" id="" name="search">
                              <option value="all" >All</option>
                              <option value="interested" >Interested</option>
                              <option value="news">News</option>
                            </select>
                          </div>
                        </li>
                        <li class="button-search item">
                          <div class="wrp-item">
                            <div>
                              <input class="form-control btn btn-bg" type="submit" value="Search">
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
                @foreach($getAlls as $getAll)
                  <div class="item-product col-md-4 col-xs-4">
                    <div class="wrp-item">
                      <div class="img-product">
                        <img class="img" src="{{ $getAll->image }}" alt="">
                        <div class="hover-view">
                          <div class="view">
                            <a class="btn-view" href="detail.html"><i class="fa fa-eye"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="ctn-product">
                        <div class="info">
                          <h3><a href="detail.html">{{ $getAll->name }}</a></h3>
                          <p class="address">{{ $getAll->address }}</p>
                        </div>
                        <div class="parameter">
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-star"></i>{{ $getAll->favorites_count }}</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-comment"></i>{{ $getAll->comments_count }}</p>
                          </div>
                          <div class="col-md-4 col-xs-4">
                            <p href=""><i class="fa fa-bookmark"></i>{{ $getAll->saves_count }}</p>
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
                      <ul class="pagination">
                        {{ $getAlls->links() }}
                      </ul>
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
