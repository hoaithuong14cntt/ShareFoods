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
                    <img src="assets/img/user/h5.jpg" alt="..." />
                    <div class="edit-avatar" data-toggle="modal" data-target="#modal-crop-img">
                      <i class="fa fa-camera"></i>
                    </div>
                  </div>
                </div>
                <div class="features">
                  <nav>
                    <ul class="nav">
                      <li class="active"><a href="user-profile.html"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                      <li><a href="edit-pass.html"><i class="fa fa-user"></i>Password</a></li>
                      <li><a href="user-saved.html"><i class="fa fa-bookmark"></i>Saved</a></li>
                    </ul>
                  </nav>
                </div>
                <div class="wrp-blur"></div>
              </div>
            </div>
            <div class="user-infor item-ctn col-md-9">
              <div class="wrp">
                <form data-toggle="validator" role="form" action="" class="form-infor form-border-color">
                  <div class="row">
                    <div class="form-group username">
                      <label class="control-label col-sm-3">Username:</label>
                      <div class="col-sm-9 show-username">
                        <p>hieutran</p>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group first-name">
                      <label class="control-label col-sm-3" for="inputFirstName">First Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputFirstName" placeholder="First name" value="Tran" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group last-name">
                      <label class="control-label col-sm-3" for="inputLastName">Last Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputLastName" placeholder="Last name" value="Hieu" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group email">
                      <label class="control-label col-sm-3" for="inputEmail">Email:</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="hieutran@gmail.com" required>
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
@endsection
