<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class MemoryFavorites extends Model
{
	use HasFactory;
	protected $fillable = [
		'name',
		'image',
		'memory_id'
	];
	protected $hidden = ['memory_id'];
	public function memory()
	{
		return $this->belongsTo(Memory::class);
	}

	public function getImageAttribute($val)
	{
		if($val)
			return Storage::temporaryUrl(
				$val,
				now()->addMinutes(10),
				['ResponseContentType' => 'application/octet-stream']
			);
		//return url($val);
	}


}
