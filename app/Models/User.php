<?php

namespace App\Models;

use App\Mail\VerificationMail;
use App\Notifications\MailVerificationNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
	use HasApiTokens, HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'email_verified_at',
		'provider',
		'provider_id',
		'notification_count',
		'is_imported'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function sendPasswordResetNotification($token)
	{
		$this->notify(new \App\Notifications\MailResetPasswordNotification($token));
	}

	/**
	 * Send the email verification notification.
	 *
	 * @return void
	 */
	public function sendEmailVerificationNotification()
	{

		$this->notify(new MailVerificationNotification()); // my notification
	}


	public function scopeSearch($query, $term)
	{
		if($term)
		{
			return $query->where(
				function($query) use ($term){

					$query->where('name', 'like', '%'.$term.'%')
					      ->orWhere('email', 'like', '%'.$term.'%');
				}
			);
		}

	}
}
