<?php

namespace App\Http\Livewire;

use App\Models\HelpfulResource;
use Image;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

class HelpfulResourceManage extends Component
{
	use WithFileUploads;

	public  $name, $url,$image, $resource_id,$order_by;

	protected $listeners =['resourceEdit'=>'edit'];
	function mount()
	{
		$this->resetInputFields();
	}

	public function render()
	{
		/*$targetFolder = '/var/www/vhosts/afsp-api.ogilvylab.co.za/httpdocs/storage/app/public';
$linkFolder = '/var/www/vhosts/afsp-api.ogilvylab.co.za/httpdocs/public/storage';
symlink($targetFolder,$linkFolder);
echo 'Symlink completed';
*/
		return view('livewire.helpful-resource-manage');
	}

	public function resetInputFields(){
		$this->resetErrorBag();
		$this->resetValidation();
		$this->name = '';
		$this->url = '';
		$this->image = '';
		$this->resource_id = '';
		$this->order_by = '';
	}


	function edit($id)
	{

		$this->resetInputFields();
		if($id){
			$resource=HelpfulResource::findOrFail($id);
			$this->name=$resource->name;
			$this->url=$resource->url;
			$this->resource_id=$id;
			$this->order_by=$resource->order_by;
			$this->dispatchBrowserEvent('openResourceModal');
		}
	}


	public function store()
	{
		$rules=['name' => 'required', 'url' => 'required|url','order_by'=>'required|integer'];
		if(!$this->resource_id)
		{
			$rules['image'] = 'required|image|mimes:jpg,jpeg,png,svg,gif';
		}

		$validatedDate = $this->validate($rules);
		$data=$validatedDate;

		if($this->image)
		{
			$folder="images/resources/";
			$name = md5($this->image . microtime()).'.'.$this->image->extension();
			//$avatar = Image::make(storage::get($this->image->path()))->resize(300, 200)->stream();
			$avatar= Image::make(storage::get($this->image->path()))->stream();
			Storage::put($folder.$name, $avatar);
			$data['image'] =$folder.$name;
		}

		HelpfulResource::updateorcreate ( [
			'id'   => $this->resource_id,
		],$data);

		session()->flash('message', 'Resource Created Successfully.');
		$this->resetInputFields();

		$this->emitUp('closeResourceModal'); // Close model to using to jquery
		$this->dispatchBrowserEvent('closeResourceModal1');
	}
}
