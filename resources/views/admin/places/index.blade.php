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
                <th>Id</th>
                <th>Tên địa điểm</th>
                <th>Hình ảnh</th>
                <th>Discount</th>
                <th>Công khai</th>
                <th>Ngày tạo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @foreach($places as $key => $place)
              <tr>
                <td>{{ $places->firstItem() +$key }}</td>
                <td>{{$place->id}}</td>
                <td>{{ $place->name }}</td>
                <td><img src="{{ $place->image }}" alt="" class="image-index"></td>
                <td>{{ $place->discount }}</td>
                <td>
                  <span class="label label-success">{!!published($place->is_published)!!}</span>
                </td>
                <td>{{ $place->created_at }}</td>
                <td>
                  <a class="btn btn-success" href="table.html#">
                  <i class="fa fa-search-plus "></i>
                  </a>
                  <a class="btn btn-info" href="table.html#">
                  <i class="fa fa-edit "></i>
                  </a>
                  <a class="btn btn-danger" href="{{ route('admin.places.destroy', ['id' => $place->id]) }}">
                  <i class="fa fa-trash-o "></i>
                  </a>
                </td>
              </tr>
              @endforeach
              </tbody>
          </table>
          <div class="pagination-outter">
            <ul class="pagination">
              {{ $places->appends(request()->all())->links() }}
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
