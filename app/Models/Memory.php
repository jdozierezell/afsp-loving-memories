<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Memory extends BaseModel
{
	use HasFactory;

	protected $fillable = [
		'name',
		'loving',
		'cover_image',
		'thumbnail',
		'description',
		'theme_color',
		'visible_type',
		'access_token',
		'reminder',
		'status_id',
		'user_id'
	];

	public function newQuery()
	{
		return parent::newQuery()->whereActive(true);
	}


	public function user()
	{
		return $this->belongsTo(User::class)->select(['name','email','id','all_memory_reminder','receive_afsp_resources']);
	}

	public function status()
	{
		return $this->belongsTo(MemoryStatus::class)->select(['name','id']);
	}
	public function photos()
	{
		return $this->hasMany(MemoryPhotos::class)->select(['image','memory_id'])->orderBy('id', 'desc');
	}

	public function videos()
	{
		return $this->hasMany(MemoryVideos::class);
	}

	public function favorites()
	{
		return $this->hasMany(MemoryFavorites::class)->select(['name', 'image','memory_id'])->orderBy('id', 'desc');
	}

	public function specialDates()
	{
		return $this->hasMany(MemorySpecialDates::class)->select(['date', 'name','memory_id']);
	}

	function friends()
	{
		return $this->hasMany(MemoryFriends::class)->select(['id','email', 'description','access_token','verified','relationship','image','memory_id'])->orderBy('id', 'desc');
	}



	function verifiedFriends()
	{
		return $this->hasMany(MemoryFriends::class)->where('verified',2)->select(['email', 'description','access_token','relationship','image','memory_id'])->orderBy('id', 'desc');
	}

	function sharedVisibility()
	{
		return $this->hasMany(MemoryVisibility::class)->select(['email', 'access_token','memory_id'])->orderBy('id', 'desc');
	}

	function UnreadNotifications()
	{
		return $this->hasMany(MemoryNotifications::class)->where(['read'=>0])->orderBy('id', 'desc');
	}

	public function getCreatedAtAttribute($date)
	{
		return date("d F Y H:i", strtotime($date));
	}

	public function getCoverImageAttribute($val)
	{
		return $this->getPublicUrl($val);
	}
	public function getThumbnailAttribute($val)
	{
		return $this->getPublicUrl($val);
	}

	public function getUpdatedAtAttribute($date)
	{
		return date("d F Y H:i", strtotime($date));
	}

}
