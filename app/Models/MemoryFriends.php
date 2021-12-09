<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoryFriends extends Model
{
	use HasFactory;
	protected $fillable = [
		'email',
		'description',
		'relationship',
		'verified',
		'memory_id',
		'access_token',
	];

	protected $appends = ['name'];
	protected $hidden = ['memory_id'];
	//define accessor
	public function getNameAttribute()
	{
		return substr($this->email, 0, strrpos($this->email, '@'));
	}

	function getVerifiedColorAttribute()
	{

		return
			[
				'0'=>'bg-light text-dark',
				'1'=>'bg-info text-dark',
				'2'=>'bg-success',
			][$this->verified];
	}

	function getVerifiedStatusAttribute()
	{

		return
			[
				'0'=>'invited',
				'1'=>'verified by owner',
				'2'=>'verified by admin',
			][$this->verified];
	}
	public function memory()
	{
		return $this->belongsTo(Memory::class);
	}
}
