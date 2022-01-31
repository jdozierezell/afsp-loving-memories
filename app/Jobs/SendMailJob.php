<?php

namespace App\Jobs;

use App\Models\Unsubscribed;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class SendMailJob implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	protected $mail;
	protected $details;
	public function __construct($mail,$details)
	{
		//
		$this->mail=$mail;
		$this->details=$details;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle()
	{

		//check unscurbised mail
		if(isset($this->details['email']))
		{
			$unsubscribed=Unsubscribed::where('email',$this->details['email'])->exists();
			if(!$unsubscribed)
			{
				if(strpos($this->mail, '\\') !== false)
					$mail_class=$this->mail;
				else
					$mail_class="App\Mail\\".$this->mail;

				$folder="mailers/".date("Y")."/".date("m")."/".date("d")."/";
				if(!is_dir($folder)) {
					mkdir($folder, 0755, true);
				}
				$file=$folder.md5(uniqid(microtime()));
				$this->details['log_mail_file']=$file.".html";
				$this->details['view_browser_link']=url('view-mailer?file='.$file);

				$this->details['unsubscribe_link']=url(route('unsubscribe',['email'=>$this->details['email'],'hash'=>md5($this->details['email'].config('UNSUBSCRIBE_SECRET'))]));
				$mail=new $mail_class($this->details);
				\Mail::to($this->details['email'])->send($mail);
			}

		}

	}
}
