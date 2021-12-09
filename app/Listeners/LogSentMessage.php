<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSent;

class LogSentMessage
{
	public function handle(MessageSent $event)
	{

		$log_file=$this->findKey($event->data,'log_mail_file');
		if($log_file)
		{
			file_put_contents($log_file,$event->message->getBody());
		}
	}

	function findKey($array, $keySearch)
	{
		foreach ($array as $key => $item) {
			if ($key == $keySearch) {
				return $item;
			} elseif (is_array($item) && $this->findKey($item, $keySearch)) {
				return $item[$keySearch];
			}
		}
		return false;
	}

}
