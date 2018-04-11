@extends('layouts.admin')
@section('admin.content')
<!-- start: Content -->
<div class="col-md-10 col-sm-11 main ">
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2><strong>Update Infomation</strong> {{ $user->firstname }}</h2>
        </div>
        <div class="panel-body">
          <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data" class="form-horizontal ">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="col-md-3 control-label">ID User</label>
              <div class="col-md-9">
                <p class="form-control-static">{{ $user->id }}</p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="email-input">Email</label>
              <div class="col-md-9">
                <input type="email" id="email-input" name="email" class="form-control" placeholder="Enter Email" value="{{ $user->email }}">
                <span class="help-block">Please enter your email</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="password-input">Password</label>
              <div class="col-md-9">
                <input type="password" id="password-input" name="password" class="form-control" placeholder="Password">
                <span class="help-block">Please enter a complex password</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="password-input">Password confirm</label>
              <div class="col-md-9">
                <input type="password" id="password-input" name="password_confirm" class="form-control" placeholder="Password Confirm">
                <span class="help-block">Please enter a complex password confirm</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="disabled-input">Firstname</label>
              <div class="col-md-9">
                <input type="text" id="disabled-input" name="firstname" class="form-control" placeholder="Firstname" value="{{ $user->firstname }}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="disabled-input">Type</label>
              <div class="col-md-9">
                <input type="text" id="disabled-input" name="type" class="form-control" placeholder="Type" value="{{ $user->type }}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="disabled-input">Lastname</label>
              <div class="col-md-9">
                <input type="text" id="disabled-input" name="lastname" class="form-control" placeholder="Lastname" value="{{ $user->lastname }}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="disabled-input">Date of birth</label>
              <div class="col-md-9">
                <input type="text" id="disabled-input" name="date_of_birth" class="form-control" placeholder="Date of birth" value="{{ $user->date_of_birth }}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Gender</label>
              <div class="col-md-9">
                <label class="radio-inline" for="inline-radio1">
                <input type="radio" id="inline-radio1" name="gender" value="1"> Male
                </label>
                <label class="radio-inline" for="inline-radio2">
                <input type="radio" id="inline-radio2" name="gender" value="2"> Female
                </label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="select">Prefecture</label>
              <div class="col-md-9">
                <select id="select" name="prefecture_id" class="form-control" size="1">
                  <option value="0">Please select</option>
                  @foreach($prefectures as $prefecture)
                  @php
                    $selected = ($prefecture->id == $user->prefecture_id)? 'selected="selected"':'';
                  @endphp
                    <option {{ $selected }} value="{{ $prefecture->id }}">{{ $prefecture->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="disabled-input">Address</label>
              <div class="col-md-9">
                <input type="text" id="disabled-input" name="address" class="form-control" placeholder="Address" value="{{ $user->address }}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="file-input">Avatar</label>
              <div class="col-md-9">
                <input type="file" id="file-input" name="avatar">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="file-input">Phone</label>
              <div class="col-md-9">
                <input type="text" name="phone">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="textarea-input">Memo</label>
              <div class="col-md-9">
                <textarea id="textarea-input" name="memo" rows="9" class="form-control" placeholder="Content.." style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 194px;"></textarea>
              </div>
            </div>
            <div class="panel-footer">
              <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
              <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/.col-->
  </div>
</div>
<!-- end: Content -->
@endsection
