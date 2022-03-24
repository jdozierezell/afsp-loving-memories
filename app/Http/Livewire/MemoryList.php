<?php

namespace App\Http\Livewire;

use App\Models\Memory;
use App\Models\MemoryStatus;
use Livewire\Component;
use Livewire\WithPagination;

class MemoryList extends Component
{
	use withPagination;


	protected $paginationTheme = 'bootstrap';

	public $memory_status_selected=null;
	public $search='';

	public function mount()
	{

	}

	public function render()
	{
		if(isset($_GET['status']))
		{
			if(is_numeric($_GET['status']))
			{
				$this->memory_status_selected=$_GET['status'];
			}
		}

		$memory_status_selected= $this->memory_status_selected;
		$search= $this->search;
		$memories = Memory::with('status')
			->select(['id','name','loving','visible_type','status_id','active','created_at'])
			->where(function($q) use ($search) { // $term is the search term on the query string
				if($search)
				{
					$q->where('name', 'LIKE', '%' . $search . '%')
					  ->orWhere('description', 'LIKE', '%' . $search . '%');
				}

			})

			->when($memory_status_selected, function ($query) use ($memory_status_selected) {
				$query->where('status_id', $memory_status_selected);
			})
			->orderBy('id','desc')
			->simplePaginate(20,['*'],'memoryListPage');

		$memory_status = MemoryStatus::all();
		return view('livewire.memory-list',array('body'=>$memories,'memory_status'=>$memory_status));
	}
}
