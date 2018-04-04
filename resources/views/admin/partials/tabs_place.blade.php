<div class="panel-body">
	@php
		if($tab == 'cmt')
		{
			$place = $place->cmt()->paginate();
		}

	@endphp
  <table class="table table-striped table-bordered bootstrap-datatable datatable">
    <thead>
      <tr>
        <th>No.</th>
        <th>user_id</th>
        <th>place_id</th>
        <th>Content</th>
        <th>Create_at</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    @foreach($place as $key => $value)
      <tr>
        <td>{{ $place->firstItem() +$key }}</td>
        <td>{{$value->user_id}}</td>
        <td>{{ $value->place_id }}</td>
		    <td>{{ $value->content }}</td>
        <td>{{ $value->created_at }}</td>
        <td>
          <a class="btn btn-danger" href="{{ route('admin.contacts.destroy', ['comment' => $value->id]) }}">
          <i class="fa fa-trash-o "></i>
          </a>
        </td>
      </tr>
      @endforeach
      </tbody>
  </table>
  <div class="pagination-outter">
    <ul class="pagination">
      {{ $place->appends(request()->all())->links() }}
    </ul>
  </div>
</div>
