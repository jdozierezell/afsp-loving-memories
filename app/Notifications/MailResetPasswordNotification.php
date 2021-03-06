<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailResetPasswordNotification extends ResetPassword
{
	use Queueable;
	public $token;
	/**
	 * Create a new notification instance.
	 *
	 * @return void
	 */
	public function __construct($token)
	{
		parent::__construct($token);
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function via($notifiable)
	{
		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable)
	{

		$new_url=config('app.APP_FRONT_URL').config('frontendRoutes.reset-password')."?token=".$this->token."&email=".$notifiable->email;
		return (new MailMessage)->view('mail.user.reset-password', ['url' =>  $new_url,'log_mail_file'=> md5(uniqid(microtime())).".html"])->subject('Reset Password');
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function toArray($notifiable)
	{
		return [
			//
		];
	}
}
