<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;
use Auth;
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
		'user_id',
		'active'
	];
	protected $appends = ['activeStatusColor','activeStatusName','descCustom'];
	public function newQuery()
	{

		if(!Auth::guard('web')->check())
			return parent::newQuery()->whereActive(true);
		else
			return parent::newQuery();
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
		return $this->hasMany(MemoryPhotos::class)->select(['image','memory_id','cover'])->orderBy('cover', 'desc')->orderBy('id', 'desc');
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
	function pendingMemories()
	{
		return $this->hasMany(MemoryFriends::class)->where('verified',0)->select(['email', 'description','access_token','relationship','image','memory_id'])->orderBy('id', 'desc');
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
		if($val)
			return $this->getPublicUrl($val);
		else
			return false;
	}
	public function getThumbnailAttribute($val)
	{
		return $this->getPublicUrl($val);
	}

	public function getUpdatedAtAttribute($date)
	{
		return date("d F Y H:i", strtotime($date));
	}

	function getActiveStatusColorAttribute ()
	{
		if(isset($this->active))
		{
			return
				[
					'0'=>'bg-info text-dark',
					'1'=>'bg-success text-dark',
				][$this->active];
		}

	}

	function getActiveStatusNameAttribute ()
	{
		if(isset($this->active)) {
			return
				[
					'1' => 'Yes',
					'0' => 'No',
				][ $this->active ];
		}
	}

	function getDescCustomAttribute ()
	{
		if($this->description)
		{
			return implode("{%@}",$this->breakLongText($this->description,1000,1100));
		}
	}

	function breakLongText($text, $length = 200, $maxLength = 250){
		//Text length
		$textLength = strlen($text);

		//initialize empty array to store split text
		$splitText = array();

		//return without breaking if text is already short
		if (!($textLength > $maxLength)){
			$splitText[] = $text;
			return $splitText;
		}

		//Guess sentence completion
		$needle = '.';

		/*iterate over $text length
		  as substr_replace deleting it*/
		while (strlen($text) > $length){

			$end = strpos($text, $needle, $length);

			if ($end === false){

				//Returns FALSE if the needle (in this case ".") was not found.
				$splitText[] = substr($text,0);
				$text = '';
				break;

			}

			$end++;
			$splitText[] = substr($text,0,$end);
			$text = substr_replace($text,'',0,$end);

		}

		if ($text){
			$splitText[] = substr($text,0);
		}

		return $splitText;

	}

}
