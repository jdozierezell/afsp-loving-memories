
@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block">
		<span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
		<strong>{{ $message }}</strong>

	</div>
@endif

@if ($message = Session::get('error'))
	<div class="alert alert-danger alert-block">
		<span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
		<strong>{{ $message }}</strong>
	</div>
@endif

@if ($message = Session::get('warning'))
	<div class="alert alert-warning alert-block">
		<span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
		<strong>{{ $message }}</strong>
	</div>
@endif

@if ($message = Session::get('info'))
	<div class="alert alert-info alert-block">
		<span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
		<strong>{{ $message }}</strong>
	</div>
@endif

@if (session()->has('message'))
	<div class="alert alert-success" style="margin-top:30px;">x
		{{ session('message') }}
	</div>
@endif

@if ($errors->any())
	<div class="alert alert-danger">
		<span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
		Check the following errors :(
	</div>
@endif
