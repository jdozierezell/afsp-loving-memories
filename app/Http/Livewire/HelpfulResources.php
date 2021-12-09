<?php

namespace App\Http\Livewire;

use App\Models\HelpfulResource;
use Livewire\Component;
use Livewire\WithPagination;

class HelpfulResources extends Component
{
	use withPagination;
	protected $paginationTheme = 'bootstrap';
	protected $listeners = ['closeResourceModal'=>'$refresh'];

	public function render()
	{
		$resources=HelpfulResource::latest()->paginate(10);
		return view('livewire.helpful-resources',compact('resources'));
	}


	public function delete($id)
	{
		if($id){
			HelpfulResource::where('id',$id)->delete();
			session()->flash('message', 'Resource Deleted Successfully.');
		}
	}

}
