@extends('layouts.admin')
@section('admin.content')
<!-- start: Content -->
<div class="col-md-10 col-sm-11 main ">
  @include('admin.partials.notification')
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
                <th>Avatar</th>
                <th>Giới tính</th>
                <th>Ngày đăng kí</th>
                <th>Trạng thái</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @foreach($staffs as $key => $staff)
              <tr>
                <td>{{ $staffs->firstItem() +$key }}</td>
                <td>{{$staff->email}}</td>
                <td>{{ $staff->fullname }}</td>
                <td><img src="{{ $staff->avatar }}" alt="" class="image-index"></td>
                <td>
                  <span class="label label-success">{!!gender($staff->gender)!!}</span>
                </td>
                <td>{{ $staff->created_at }}</td>
                <td>
                  {!! active($staff->status) !!}
                </td>
                <td>
                  <a class="btn btn-success" href="table.html#">
                  <i class="fa fa-search-plus "></i>
                  </a>
                  <a class="btn btn-info" href="table.html#">
                  <i class="fa fa-edit "></i>
                  </a>
                  <a class="btn btn-danger" href="{{ route('admin.staffs.destroy', ['staff' => $staff->id]) }}">
                  <i class="fa fa-trash-o "></i>
                  </a>
                </td>
              </tr>
              @endforeach
              </tbody>
          </table>
          <div class="pagination-outter">
            <ul class="pagination">
              {{ $staffs->appends(request()->all())->links() }}
            </ul>
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
