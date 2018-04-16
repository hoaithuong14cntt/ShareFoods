@extends('layouts.admin')
@section('admin.content')
<!-- start: Content -->
<div class="col-md-10 col-sm-11 main ">
  @include('admin.partials.notification')
  <div class="row">
    <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-body message">
          <p class="text-center">New Message</p>
          <form action="{{ route('admin.contacts.send') }}" class="form-horizontal" role="form" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="to" class="col-sm-1 control-label">To:</label>
              <div class="col-sm-11">
                <input type="email" class="form-control" id="to" placeholder="Type email" value="{{ $user->email }}">
                <input type="hidden" class="form-control" name="user_id" value="{{ $user->id }}">
              </div>
            </div>
            <div class="col-sm-11 col-sm-offset-1">
              <div class="form-group">
                <textarea class="form-control" id="message" name="content" rows="12" placeholder="Click here to reply"></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success">Send</button>
                <button type="submit" class="btn btn-danger">Discard</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/.col-->
    <!--/col-->
  </div>
  <!--/row-->
</div>
<!-- end: Content -->
@endsection
