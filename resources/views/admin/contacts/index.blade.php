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
                <th>User ID</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Ngày tạo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @foreach($contacts as $key => $contact)
              <tr>
                <td>{{ $contacts->firstItem() +$key }}</td>
                <td>{{$contact->user_id}}</td>
                <td>{{ $contact->title }}</td>
                <td><img src="{{ $contact->content }}" alt=""></td>
                <td>{{ $contact->created_at }}</td>
                <td>
                  <a class="btn btn-success" href="table.html#">
                  <i class="fa fa-search-plus "></i>
                  </a>
                  <a class="btn btn-info" href="table.html#">
                  <i class="fa fa-edit "></i>
                  </a>
                  <a class="btn btn-danger" href="{{ route('admin.contacts.destroy', ['contact' => $contact->id]) }}">
                  <i class="fa fa-trash-o "></i>
                  </a>
                </td>
              </tr>
              @endforeach
              </tbody>
          </table>
          <div class="pagination-outter">
            <ul class="pagination">
              {{ $contacts->appends(request()->all())->links() }}
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
