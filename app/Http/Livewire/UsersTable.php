<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $search='';
	public function render()
	{
		$users = User::select(['name','email','created_at'])
				->search($this->search)
				->orderBy('id','desc')
				->simplePaginate(20,['*'],'userListPage');


		return view('livewire.users-table',array('users'=>$users,));

	}
}
