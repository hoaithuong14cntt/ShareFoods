@extends('layouts.public')
@section('public.content')
<div id="content">
  <div class="user-profile wrapper-content">
    <div class="container">
      <div class="row wrp-ctn-user">
        <div class="title">
          <h2>Create New Food</h2>
          <p class="underline"></p>
        </div>
        <div class="ctn-user ctn-main">
          <div class="row ">
            <div class="user-infor item-ctn col-md-9">
              <div class="wrp">
                <form action="{{ route('sharefood.profile.storeFood') }}" method="POST" data-toggle="validator" role="form" class="form-infor form-border-color" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="form-group username">
                      <label class="control-label col-sm-3">Name of Food:</label>
                      <div class="col-sm-9 show-username">
                        <input type="hidden" name="place_id" value="{{ $place_id }}">
                        <input type="text" class="form-control" name="name" id="inputFirstName" placeholder="Name of food" value="Rau muong chien" required>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group first-name">
                      <label class="control-label col-sm-3" for="inputFirstName">Price:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="price" id="inputFirstName" placeholder="ADdress" value="10000" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">Image:</label>
                      <div class="col-sm-9">
                        <input name="image" class="form-control" type="file">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">Description:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" name="description" placeholder="Description" value="fdhbdfhd" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">Content:</label>
                      <div class="col-sm-9">
                        <textarea rows="4" cols="50" class="form-control" name="content">dhbfdbh</textarea>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group edit">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-bg pull-right">Create</button>
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
@endsection
