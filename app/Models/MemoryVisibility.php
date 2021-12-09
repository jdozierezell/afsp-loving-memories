<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoryVisibility extends Model
{
    use HasFactory;
    protected  $table="memory_visibility";
	protected $fillable = [
		'email',
		'memory_id',
		'access_token',
	];
	protected $hidden = ['memory_id'];
	public function memory()
	{
		return $this->belongsTo(Memory::class);
	}
}
