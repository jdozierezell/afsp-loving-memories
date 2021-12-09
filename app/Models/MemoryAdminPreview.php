<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoryAdminPreview extends Model
{
    use HasFactory;
    protected  $table="memory_admin_preview";
	public $timestamps = false;
	public $primaryKey='memory_id';
	protected $fillable = [
		'memory_id',
		'access_token',
		'expire_at',
	];

	public function memory()
	{
		return $this->belongsTo(Memory::class);
	}
}
