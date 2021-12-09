<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class TStart extends Component
{
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public $headers=[];
	public function __construct($headers=array())
	{
		//
		$this->headers=$this->formatHeaders($headers);

	}



	function formatHeaders($headers)
	{

		return array_map(function($header)
		{
			$default=['label'=>"","field"=>'',"classes"=>'px-4','appendClass'=>''];
			if(!is_array($header))
			{
				$default['label']=$header;
			}
			else
			{
				array_merge($default,$header);
			}
			return $default;
		},$headers);
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.table.tstart');
	}
}
