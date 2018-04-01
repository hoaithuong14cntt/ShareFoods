@extends('layouts.admin')
@section('admin.content')
<!-- start: Content -->
<div class="col-md-10 col-sm-11 main ">
  @include('admin.partials.notification')
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-plus"></i><span class="break"></span>Thông tin cá nhân của {{ $user->fullname }}</h2>
              <div class="panel-actions">
                <a href="ui-elements.html#" class="btn-close"><i class="fa fa-times"></i></a>
              </div>
            </div>
            <div class="panel-body">
              <div class="avatar">
                <img src="{{ $user->avatar }}" alt="">
              </div>
            </div>
            <div class="panel-body">
              <table class="table table-bordered table-striped">
                <tbody>
                  <tr>
                    <td>Id</td>
                    <td>{{ $user->id }}</td>
                  </tr>
                  <tr>
                    <td>Họ tên</td>
                    <td>{{ $user->fullname }}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                    <td>Ngày sinh</td>
                    <td>{{ $user->date_of_birth }}</td>
                  </tr>
                  <tr>
                    <td>Giới tính</td>
                    <td><span class="label label-success">{!!gender($user->gender)!!}</span></td>
                  </tr>
                  <tr>
                    <td>Địa chỉ</td>
                    <td>{{ $user->address }}</td>
                  </tr>
                  <tr>
                    <td>Ngày tạo</td>
                    <td>{{ $user->created_at }}</td>
                  </tr>
                  <tr>
                    <td>Ngày tạo</td>
                    <td>{{ $user->created_at }}</td>
                  </tr>

                </tbody>
              </table>
            </div>
            <div class="panel-body">
              <form action="{{ route('admin.users.show', ['id' => $user->id]) }}" method="get" accept-charset="utf-8">
                {{ csrf_field() }}
                <input type="hidden" name="status" value="{{ $user->status }}">
                <input type="submit" class="btn btn-primary noty" value="{{ activeUser($user->status) }}" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/col-->
  </div>
  <!--/row-->
</div>
<!-- end: Content -->
@endsection
