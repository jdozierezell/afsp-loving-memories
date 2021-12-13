<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class MemoryPhotos extends BaseModel
{
	use HasFactory;
	protected $fillable = [
		'memory_id',
		'image',
	];

	protected $hidden = ['memory_id'];
	protected $appends = ['url'];
	public function memory()
	{
		return $this->belongsTo(Memory::class);
	}

	public function getCreatedAtAttribute($date)
	{
		return date("Y-m-d",strtotime($date));
	}

	public function getImageAttribute($val)
	{
		return $this->getPublicUrl($val);
	}
	public function getUrlAttribute()
	{
		//add thumbnail to url
		if($this->image)
		{
			$fileinfo = pathinfo($this->image);
			$filename=$fileinfo['filename']."_thumbnail.".$fileinfo['extension'];
			$image=$fileinfo['dirname']."/".$filename;
			return $this->getPublicUrl($image);
		//	return url($image);
		}
	}


	public function getUpdatedAtAttribute($date)
	{
		return date("Y-m-d",strtotime($date));
	}

}
