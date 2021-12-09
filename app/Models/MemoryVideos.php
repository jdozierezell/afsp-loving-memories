<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoryVideos extends Model
{
	use HasFactory;
	protected $fillable = [
		'memory_id',
		'video',
		'vimeo_id'
	];
	protected $hidden = ['memory_id'];
	public function memory()
	{
		return $this->belongsTo(Memory::class);
	}

	public function getCreatedAtAttribute($date)
	{
		return date("Y-m-d",strtotime($date));
	}

	public function getUpdatedAtAttribute($date)
	{
		return date("Y-m-d",strtotime($date));
	}
}
