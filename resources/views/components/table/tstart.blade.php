<div class="table-responsive">
	<table class="table  align-middle">
		<thead>
			<tr class="align-top">

				@foreach($headers as $header)
					<th scope="{{$header['classes']}} {{$header['appendClass']}}">{{ucwords(strtolower($header['label']))}}</th>
				@endforeach
			</tr>
		</thead>
		<tbody class="align-top">
			{{$body}}
		</tbody>
	</table>
</div>
