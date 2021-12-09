<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpfulResource extends Model
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
		return url("storage/".$val);
	}

}
