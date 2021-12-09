<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MemorySpecialDateMail extends Mailable
{
	use Queueable, SerializesModels;
	public $memory;

	/**
	 * Create a new message instance.
	 *
	 * @param $memory
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

		return $this->subject(" Remembering your loving memory")
		            ->view('mail.memory.memory-special-date');
	}
}
