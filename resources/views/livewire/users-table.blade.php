<div>
	<form>
		<div class="row g-3">
			<div class="col">
				<div class="form-group">
					<label for="Search">Search</label>
					<input type="text" class="form-control" wire:model.debounce.500ms="search" placeholder="Search" aria-label="Search">
				</div>
			</div>
		</div>
	</form>


	<x-table.TStart :headers="['Name','Email','created Date']">
		<x-slot name="body">
			@foreach($users  as $user)
				<x-table.row>
					<x-table.cell>{{$user->name}}</x-table.cell>
					<x-table.cell>{{$user->email}}</x-table.cell>
					<x-table.cell>{{$user->created_at}}</x-table.cell>
				</x-table.row>
			@endforeach
		</x-slot>
	</x-table.TStart>
	{{$users->withQueryString()->links()}}
</div>
