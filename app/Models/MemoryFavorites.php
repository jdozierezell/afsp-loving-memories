<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
		return url($val);
	}


}
