<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Support\Carbon;
use URL;

class MailVerificationNotification extends VerifyEmailBase
{
	use Queueable;



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
		//URL::forceRootUrl(config('app.APP_FRONT_URL'));
		$url=$this->verificationUrl($notifiable);
		$path=pathinfo($url);
		$new_url=config('app.APP_FRONT_URL').config('frontendRoutes.verify-account').$path['basename'];

		return (new MailMessage)->view('mail.user.verify-account', ['url' => $new_url,'log_mail_file'=> md5(uniqid(microtime())).".html"])->subject('Verify your account');
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
