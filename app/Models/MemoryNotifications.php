<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoryNotifications extends Model
{
    use HasFactory;
	protected $fillable = [
		'memory_id',
		'user_to_notify',
		'type_id',
		'user_who_fired_event',
		'friend_memory_id',
		'data',
		'read',
	];
	protected $hidden = ['memory_id','friend_memory_id'];
	public function memory()
	{
		return $this->belongsTo(Memory::class);
	}


}
