<div class="alert alert-success col-md-6" id="success-alert" style="position: fixed;top: 210px;z-index: 999999;display: none;">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong> {{ sitetrans('success')  }} </strong><span id="alert-success">   </span>
</div>


<div class="alert alert-danger col-md-6" id="danger-alert" style="position: fixed;top: 210px;z-index: 999999;display: none">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong> {{ sitetrans('warning')  }} </strong><span id="alert-danger">   </span>
</div>


<div class="col-lg-12">
	@if (\Session::has('success'))
		<div class="alert alert-success"> {!! \Session::get('success') !!} </div>
	@endif
</div>

<div class="col-lg-12">
		 @if ($errors->any())
			 @foreach ($errors->all() as $error)
				 <div class="col-md-12 alert alert-danger">{{$error}}</div>
			 @endforeach
		 @endif
</div>