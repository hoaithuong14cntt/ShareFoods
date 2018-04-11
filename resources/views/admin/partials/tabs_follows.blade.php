<div class="panel-body">
  @php
    $staff = $staff->followers()->paginate();
  @endphp

  <table class="table table-striped table-bordered bootstrap-datatable datatable">
    <thead>
      <tr>
        <th>No.</th>
        <th>Email</th>
        <th>Avatar</th>
        <th>Giới tính</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($staff as $key => $value)
      <tr>
        <td>{{ $staff->firstItem() +$key }}</td>
        <td>{{$value->email}}</td>
        <td><img src="{{ $value->avatar }}" alt="" class="image-index"></td>
        <td>
          <span class="label label-success">{!!gender($value->gender)!!}</span>
        </td>
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
