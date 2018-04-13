@if(session()->has('notification.message'))
<div class="alert alert-{{ session('notification.type') }} alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ session('notification.message') }}
</div>
@endif