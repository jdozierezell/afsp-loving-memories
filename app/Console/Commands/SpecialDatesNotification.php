<?php

namespace App\Console\Commands;

use App\Mail\MemorySpecialDateMail;
use App\Models\Memory;
use App\Models\MemorySpecialDates;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SpecialDatesNotification extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'daily:special-dates-notification';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Send Mail to user if they subscribed for special dates notifications';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		//get all memories  with reminder
		$today_date = Carbon::createFromFormat('d-m-y', date("y-m-d"));

		$special_dates = MemorySpecialDates::with('memory','memory.user')->whereMonth('date', $today_date->month)
		                        ->whereDay('date', $today_date->day)
		                        ->get();
		if($special_dates)
		{
			foreach($special_dates as $special_date)
			{
				$memory=$special_date->memory;

				$memory_detail['name']=$memory->name;
				$memory_detail['date']=$special_date->date;
				$memory_detail['date_meaning']=$special_date->name;
				$memory_detail['cover_image']=$memory->cover_image;
				$memory_detail['loving']=$memory->loving;
				$memory_detail['email']=$special_date->memory->user->email;
				$memory_detail['url']=config('app.APP_FRONT_URL').$this->replaceURLPrams(config('frontendRoutes.view-memory'),'access_token',$memory->access_token);
				if(config('app.debug') == false)
					\Mail::to($memory_detail['email'])->send(new MemorySpecialDateMail($memory_detail));
			}
		}
	}

	function replaceURLPrams($route,$field,$value)
	{
		return str_ireplace("{:$field}",$value,$route,$count);
	}
}
