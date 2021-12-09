@extends('layouts.app')

@section('content')
	<h1 class="mt-4">Memories</h1>

	<div class="row">
		<div class="col-md-12">

			<div class="accordion" id="myAccordion">
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingOne">
						<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#basic-info">Basic Information</button>

					</h2>
					<div id="basic-info" class="accordion-collapse collapse show" data-bs-parent="#myAccordion">
						<div class="card-body px-4 border-top">
							<div class="container">
								<div class="row">
									<div class="col-sm">
										<div class="form-group">
											<label for="exampleFormControlInput1">Name : {{$memory->name}}</label>
										</div>
									</div>
									<div class="col-sm">
										<div class="form-group">
											<label for="exampleFormControlInput1">Loving : {{$memory->loving}}</label>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-sm">
										<div class="form-group">
											<label for="exampleFormControlInput1">Description :</label>
											<p> {{$memory->description}}</p>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm">
										<div class="form-group">
											<label for="exampleFormControlInput1">Theme : {{$memory->theme_color}}</label>
										</div>
									</div>
									<div class="col-sm">
										<div class="form-group">
											<label for="exampleFormControlInput1">Visible : {{$memory->visible_type}}</label>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-sm">
										<div class="form-group">
											<label for="exampleFormControlInput1">Status : <span class="badge rounded-pill {{$memory->status->status_color}}">	{{$memory->status->name}}</span> </label>
										</div>
									</div>
									<div class="col-sm">
										<div class="form-group">
											<label for="exampleFormControlInput1">Created Date: {{$memory->created_at}}</label>
										</div>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col text-center">
									<form method="post" action="{{url('admin/memory/preview')}}" id="admin-preview-form">
										<div class="col text-center">
											<div class="form-group">
												@csrf
												<input type="hidden" value="{{$memory->id}}" name="id">
												<button  class="btn btn-info" type="submit">Preview Memory</button>
											</div>
										</div>
									</form>
									<!--<div class="form-group">
										<a  class="btn btn-primary" href="{{config('app.APP_FRONT_URL')."/memory/view?token=".$memory->access_token}}">Preview Memory</a>
									</div>-->
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingOne">
						<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#photos">Photos</button>

					</h2>
					<div id="photos" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
						<div class="card-body px-4 border-top">
							<div class="container">
								<div class="row row-cols-1 row-cols-md-3 g-4">
									@foreach($memory->photos as $photos)
										<div class="col">
											<div class="card card h-100">
												<img src="{{url($photos->image)}}" class="card-img-top" alt="...">
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingOne">
						<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#favorite-memories">Favorite Memories</button>

					</h2>
					<div id="favorite-memories" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
						<div class="card-body px-4 border-top">
							<div class="container">
								<div class="row row-cols-1 row-cols-md-3 g-4">
									@foreach($memory->favorites as $favorite)
										<div class="col">
											<div class="card card h-100">
												<img src="{{url($favorite->image)}}" class="card-img-top" alt="...">
												<div class="card-body">
													<h5 class="card-title">{{$favorite->name}}</h5>
												</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingOne">
						<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#special-dates">Special Dates</button>

					</h2>
					<div id="special-dates" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
						<div class="card-body px-4 border-top">
							<div class="container">
								<div class="row row-cols-1 row-cols-md-3 g-4">
									@foreach($memory->specialDates as $special)
										<div class="col">
											<div class="card w-100">
												<div class="card-body">
													<h5 class="card-title">{{$special->name}}</h5>
													<p class="card-text">{{$special->date}}</p>
												</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingOne">
						<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#shared-friends">Include Friends and Family</button>

					</h2>
					<div id="shared-friends" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
						<div class="card-body px-4 border-top">
							<div class="container">
								<div class="row row-cols-1 row-cols-md-3 g-4">
									@foreach($memory->friends as $friend)
										<div class="col">
											<div class="card w-100">
												<div class="card-body">
													<h5 class="card-title">{{$friend->email}}</h5>
													<p class="card-text">{{$friend->description}}</p>
													<p class="card-text">Relationship: {{$friend->relationship}}</p>
												</div>
												<div class="card-footer">
													<div class="row ">
														<div class="card-text col"><span class="badge rounded-pill {{$friend->verified_color}}">	{{$friend->verified_status}}</span>
														</div>
														@if($friend->verified==1)
															<div class="col" >
																<form method="post" action="{{url('admin/friend/memory/approve')}}" >
																	<div class="col text-center"  >
																		<div class="form-group"  >
																			@csrf
																			<input type="hidden" value="{{$friend->id}}" name="friend_memory_id">
																			<button  class="btn btn-success" type="submit">Approve</button>
																		</div>
																	</div>
																</form>
															</div>

														@endif
													</div>



												</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="accordion-item">
					<h2 class="accordion-header" id="headingOne">
						<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#memory-visibility">Visibility </button>

					</h2>
					<div id="memory-visibility" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
						<div class="card-body px-4 border-top">
							<div class="container">
								<div class="card" style="width: 18rem;">
									<ul class="list-group list-group-flush">
										@foreach($memory->sharedVisibility as $shared)
											<li class="list-group-item">{{$shared->email}}</li>
										@endforeach
									</ul>
								</div>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<br>
	@if($memory->status_id>=2)
		<div class="row">
			<div class="col">
				<form method="post" action="{{url('admin/memory/approve')}}">
					<div class="col text-center">
						<div class="form-group">
							@csrf
							<input type="hidden" value="{{$memory->id}}" name="id">
							<button  class="btn btn-success" type="submit">Approve</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col">
				<form method="post" class="" action="{{url('admin/memory/reject')}}">
					<div class="col text-center">
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Reject Reason</label>
							<textarea class="form-control" name="reject_reason" required rows="3"></textarea>

								@if($errors->has('reject_reason'))
									<span class="text-danger">{{ $errors->first('reject_reason') }}</span>
								@endif

						</div>
						<div class="form-group">
							@csrf
							<input type="hidden" value="{{$memory->id}}" name="id">

						</div>
						<br>
						<button  class="btn btn-warning" type="submit">Reject</button>
					</div>
				</form>
			</div>
		</div>

	@else
		<p class="text-center px-4">Memory is in draft mode no actions allowed</p>
	@endif


@endsection


@push('scripts')
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("#admin-preview-form").submit(function(e) {
				e.preventDefault(); // avoid to execute the actual submit of the form.
				var form = $(this);
				var url = form.attr('action');
				$.ajax({
					type: "POST",
					url: url,
					data: form.serialize(), // serializes the form's elements.
					success: function(data)
					{
						console.log(data);
						//	window.open(data.url)
					},
					error: function()
					{
						alert('server error');
					}
				});
			});
		});
	</script>



@endpush
