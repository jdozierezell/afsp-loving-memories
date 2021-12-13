<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class HelpfulResource extends BaseModel
{
	use HasFactory;

	protected $fillable = [
		'name',
		'image',
		'url',
		'order_by'
	];


	public function getImageAttribute($val)
	{
		return $this->getPublicUrl($val);


		//return url("storage/".$val);
	}

}
