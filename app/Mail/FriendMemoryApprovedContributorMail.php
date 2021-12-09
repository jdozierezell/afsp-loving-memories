<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FriendMemoryApprovedContributorMail extends Mailable
{
	use Queueable, SerializesModels;
	public $memory;
	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($memory)
	{
		//
		$this->memory = $memory;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{

		return $this->subject("Your contribution to loving memories is approved")
		            ->view('mail.memory.friend-memory-approved-contributor');
	}
}
