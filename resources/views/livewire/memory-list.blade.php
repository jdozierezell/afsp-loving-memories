<div>
	<form>
		<div class="row g-3">
			<div class="col">
				<div class="form-group">
					<label for="Search">Search</label>
					<input type="text" class="form-control" wire:model.debounce.500ms="search" placeholder="Search" aria-label="Search">
				</div>
			</div>
			<div class="col">
				<div class="form-group">
					<label for="exampleFormControlSelect1">Status</label>
					<select class="form-control"   wire:model="memory_status_selected">
						<option value="">All</option>
						@foreach($memory_status as $status)
							<option value="{{$status->id}}">{{$status->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>
	</form>


	<x-table.TStart :headers="['Name','Loving','Visible','status','created Date','Actions']">
		<x-slot name="body">
			@foreach($body  as $memory)
				<x-table.row>
					<x-table.cell>{{$memory->name}}</x-table.cell>
					<x-table.cell>{{$memory->loving}}</x-table.cell>
					<x-table.cell>{{$memory->visible_type}}</x-table.cell>
					<x-table.cell>
						<span class="badge rounded-pill {{$memory->status->status_color}}">	{{$memory->status->name}}</span>
					</x-table.cell>
					<x-table.cell  appendClasses="text-right">{{$memory->created_at}}</x-table.cell>
					<x-table.cell>
						<a class="btn btn-outline-primary" href="{{url('/admin/memory/view/'.$memory->id)}}">View</a>
					</x-table.cell>
				</x-table.row>
			@endforeach
		</x-slot>
	</x-table.TStart>
	{{$body->withQueryString()->links()}}
</div>
