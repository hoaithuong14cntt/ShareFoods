<div class="panel-body">
  @php
    $user = $user->follows()->paginate();
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
    @foreach($user as $key => $value)
      <tr>
        <td>{{ $user->firstItem() +$key }}</td>
        <td>{{$value->email}}</td>
        <td><img src="{{ $value->avatar }}" alt="" class="image-index"></td>
        <td>
          <span class="label label-success">{!!gender($value->gender)!!}</span>
        </td>
        <td>
          <a class="btn btn-success" href="{{ route('admin.users.show', ['user' => $value->id]) }}">
          <i class="fa fa-search-plus "></i>
          </a>
          <a class="btn btn-danger" href="{{ route('admin.users.destroy', ['user' => $value->id]) }}">
          <i class="fa fa-trash-o "></i>
          </a>
        </td>
      </tr>
      @endforeach
      </tbody>
  </table>
  <div class="pagination-outter">
    <ul class="pagination">
      {{ $user->appends(request()->all())->links() }}
    </ul>
  </div>
</div>
