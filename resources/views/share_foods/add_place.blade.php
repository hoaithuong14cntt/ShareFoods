@extends('layouts.public')
@section('public.content')
<div id="content">
  <div class="user-profile wrapper-content">
    <div class="container">
      <div class="row wrp-ctn-user">
        <div class="title">
          <h2>Create New Place</h2>
          <p class="underline"></p>
        </div>
        <div class="ctn-user ctn-main">
          <div class="row ">
            <div class="user-infor item-ctn col-md-9">
              <div class="wrp">
                <form action="{{ route('sharefood.profile.storePlace') }}" method="POST" data-toggle="validator" role="form" action="" class="form-infor form-border-color" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="row">
                    <div class="form-group username">
                      <label class="control-label col-sm-3">Name of Place:</label>
                      <div class="col-sm-9 show-username">
                        <input type="text" class="form-control" name="name" id="inputFirstName" placeholder="Name of place" value="Royal" required>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group first-name">
                      <label class="control-label col-sm-3" for="inputFirstName">Address:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" id="inputFirstName" placeholder="ADdress" value="hoang dieu" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group last-name">
                      <label class="control-label col-sm-3" for="inputLastName">Phone:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone" id="inputLastName" placeholder="Phone" value="012345678" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">Discount:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" name="discount" placeholder="Discount" value="0">
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
                          <option value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                          @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">Category:</label>
                      <div class="col-sm-9">
                        <select name="category_id">
                          @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
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
                      <label class="control-label col-sm-3" for="inputEmail">Lat:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" name="lat" placeholder="Lat" value="254.2" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">Lng:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" name="lng" placeholder="Lng" value="424.2" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">Start time:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" name="start_time" placeholder="Start time" value="05:30" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">End time:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" name="end_time" placeholder="End time" value="06:30" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">From Price:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" name="from_price" placeholder="From Price" value="1000" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">To Price:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail" name="to_price" placeholder="To Price" value="2000" required>
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
