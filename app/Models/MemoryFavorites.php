<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class MemoryFavorites extends BaseModel
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
		return $this->getPublicUrl($val);
		//return url($val);
	}


}
