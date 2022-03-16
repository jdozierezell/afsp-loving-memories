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
		'cover'
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
	public function getUrlAttribute()
	{
		//add thumbnail to url
		if($this->image)
		{
			$fileinfo = parse_url($this->image);
			$path=$fileinfo['path'];
			$path_info=pathinfo($path);

			$filename=$path_info['filename']."_thumbnail.".$path_info['extension'];
			$dir = ltrim($path_info['dirname'], '/');
			$image=$dir."/".$filename;
			return $this->getPublicUrl($image);
			//	return url($image);
		}
	}

	public function getImageAttribute($val)
	{
		return $this->getPublicUrl($val);
	}


	public function getUpdatedAtAttribute($date)
	{
		return date("Y-m-d",strtotime($date));
	}

}
