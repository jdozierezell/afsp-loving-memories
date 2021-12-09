<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoryStatus extends Model
{
    use HasFactory;
	protected $table="memory_status";

	public function memory()
	{
		return $this->belongsTo(Memory::class);
	}


	function getNameAttribute($value)
	{
		return ucwords(strtolower($value));
	}


	function getStatusColorAttribute()
	{
		return
		[
			'1'=>'bg-light text-dark',
			'2'=>'bg-info text-dark',
			'3'=>'bg-success',
			'4'=>'bg-warning text-dark',
		][$this->id];
	}

}
