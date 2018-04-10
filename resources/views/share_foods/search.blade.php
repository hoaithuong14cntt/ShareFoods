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
                    <form action="{{ route('sharefood.smartSearch') }}" method="POST" class="form-avatar">
                      {{csrf_field()}}
                      <ul class="nav">
                        <li class="input-address item">
                          <div class="form-group">
                            <div class="">
                              <input type="text" class="form-control" name="keyword" id="test11" placeholder="Keyword" value="">
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                        </li>
                        <li class="city item-three item">
                          <div class="form-group wrp-item">
                            <select class="form-control" id="" name="prefecture_id">
                              <option value="0" >Prefecture</option>
                              @foreach($prefectures as $prefecture)
                              <option value="{{ $prefecture->id }}" >{{ $prefecture->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </li>
                        <li class="type item-three item">
                          <div class="form-group wrp-item">
                            <select class="form-control" id="" name="category_id">
                              <option value="0" >Categories</option>
                              @foreach($categories as $category)
                              <option value="{{ $category->id }}" >{{ $category->name }}</option>
                              @endforeach
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
                            <p href=""><i class="fa fa-star"></i> {{ $place->favorites_count }}</p>
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
                      <ul class="pagination">
                        {{ $places->links() }}
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
