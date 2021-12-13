<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

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

		return Storage::temporaryUrl(
			$val,
			now()->addMinutes(10),
			['ResponseContentType' => 'application/octet-stream']
		);

		//return url("storage/".$val);
	}

}
