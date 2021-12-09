<div  x-data>
	<x-loading-indicator></x-loading-indicator>
	@include('flash-message')
	<livewire:helpful-resource-manage :wire:key="'helpful-resource-manage'"> </livewire:helpful-resource-manage>


	<table class="table table-bordered mt-5">
		<thead>
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		@foreach($resources as $value)
			<tr >
				<td>{{ $value->id }}</td>
				<td>{{ $value->name }}</td>
				<td>
					<img src="{{ $value->image }}" style="width: 100px; height: 100px;">
				</td>
				<td>
					<button  data-toggle="modal" data-target="#updateModal" wire:key="edit-{{ $value->id}}" wire:click="$emitTo('helpful-resource-manage', 'resourceEdit','{{$value->id}}')" class="btn btn-primary btn-sm">Edit</button>
					<button type="button" class="btn btn-danger btn-sm" wire:key="delete-{{ $value->id }}" wire:click="delete({{ $value->id }})" onclick="confirm('Are you sure you want to remove?') || event.stopImmediatePropagation()" >Delete</button>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	{{$resources->withQueryString()->links()}}


</div>




