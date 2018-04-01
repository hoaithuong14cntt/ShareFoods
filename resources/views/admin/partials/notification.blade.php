@if(Session::has('msg'))
<div class="alert alert-success fade in">
  <button data-dismiss="alert" class="close close-sm" type="button">
  <i class="icon-remove"></i>
  </button>
  <strong>{{ Session::get('msg') }}</strong>
</div>
@endif
@if(Session::has('err'))
<div class="alert alert-danger fade in">
  <button data-dismiss="alert" class="close close-sm" type="button">
  <i class="icon-remove"></i>
  </button>
  <strong>{{ Session::get('err') }}</strong>
</div>
@endif
