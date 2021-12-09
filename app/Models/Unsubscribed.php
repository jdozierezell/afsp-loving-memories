<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Unsubscribed extends Model
{
	protected  $table="unsubscribe_mails";
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'email'
	];
}
