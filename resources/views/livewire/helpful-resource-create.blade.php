<div>
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#openresourcecreateForm">
		Open Form
	</button>

	<!-- Modal -->
	<div wire:ignore.self class="modal fade" id="openresourcecreateForm" tabindex="-1" role="dialog" aria-labelledby="openresourcecreateForm" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="openresourceLabel">Create Resource</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true close-btn">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="exampleFormControlInput1">Name</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" wire:model.defer="name">
							@error('name') <span class="text-danger error">{{ $message }}</span>@enderror
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput2">Link</label>
							<input type="url" class="form-control" id="exampleFormControlInput2" wire:model.defer="url" placeholder="Enter Link">
							@error('url') <span class="text-danger error">{{ $message }}</span>@enderror
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
					<button type="button" wire:click.prevent="$emitUp('store')" class="btn btn-primary close-modal">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	@once
	@push('scripts')
		<script type="text/javascript">
			window.livewire.on('closeResourceModal', () => {
				$('#openresourcecreateForm').modal('hide');
			});
		</script>
	@endpush
	@endonce
</div>


