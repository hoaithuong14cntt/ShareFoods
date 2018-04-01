@extends('layouts.admin')
@section('admin.content')
<!-- start: Content -->
<div class="col-md-10 col-sm-11 main ">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
              <tr>
                <th>No.</th>
                <th>Email</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày đăng kí</th>
                <th>Trạng thái</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
              <tr>
                <td>1</td>
                <td>{{$user->email}}</td>
                <td>{{ $user->fullname }}</td>
                <td>
                  <span class="label label-success">{!!gender($user->gender)!!}</span>
                </td>
                <td>{{ $user->created_at }}</td>
                <td>
                  {!! active($user->status) !!}
                </td>
                <td>
                  <a class="btn btn-success" href="table.html#">
                  <i class="fa fa-search-plus "></i>
                  </a>
                  <a class="btn btn-info" href="table.html#">
                  <i class="fa fa-edit "></i>
                  </a>
                  <a class="btn btn-danger" href="table.html#">
                  <i class="fa fa-trash-o "></i>
                  </a>
                </td>
              </tr>
              @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/col-->
  </div>
  <!--/row-->
</div>
<!-- end: Content -->
@endsection
