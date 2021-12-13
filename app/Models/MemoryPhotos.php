<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoryPhotos extends Model
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
		if($val)
			return Storage::temporaryUrl(
				$val,
				now()->addMinutes(10),
				['ResponseContentType' => 'application/octet-stream']
			);
		//return url($val);
	}
	public function getUrlAttribute()
	{
		//add thumbnail to url
		if($this->image)
		{

			$fileinfo = pathinfo($this->image);
			$filename=$fileinfo['filename']."_thumbnail.".$fileinfo['extension'];
			$image=$fileinfo['dirname']."/".$filename;
				return Storage::temporaryUrl(
					$image,
					now()->addMinutes(10),
					['ResponseContentType' => 'application/octet-stream']
				);
		//	return url($image);
		}


	}



	public function getUpdatedAtAttribute($date)
	{
		return date("Y-m-d",strtotime($date));
	}

}
