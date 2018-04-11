<div class="panel-body">
	@php
		if($tab == 'places')
		{
			$staff = $staff->places()->paginate();
		}

	@endphp
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
    @foreach($staff as $key => $value)
      <tr>
        <td>{{ $staff->firstItem() +$key }}</td>
        <td>{{$value->id}}</td>
        <td>{{ $value->name }}</td>
        <td><img src="{{ $value->image }}" alt="" class="image-index"></td>
		<td>{{ $value->discount }}</td>
        <td>
          <span class="label label-success">{!!published($value->is_published)!!}</span>
        </td>
        <td>{{ $value->created_at }}</td>
        <td>
          <a class="btn btn-success" href="{{ route('admin.staffs.show', ['staff' => $value->id]) }}">
          <i class="fa fa-search-plus "></i>
          </a>
          <a class="btn btn-danger" href="{{ route('admin.staffs.destroy', ['staff' => $value->id]) }}">
          <i class="fa fa-trash-o "></i>
          </a>
        </td>
      </tr>
      @endforeach
      </tbody>
  </table>
  <div class="pagination-outter">
    <ul class="pagination">
      {{ $staff->appends(request()->all())->links() }}
    </ul>
  </div>
</div>
