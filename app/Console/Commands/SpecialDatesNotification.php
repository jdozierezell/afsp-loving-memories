<?php

namespace App\Console\Commands;

use App\Mail\MemorySpecialDateMail;
use App\Models\Memory;
use App\Models\MemorySpecialDates;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;
use Storage;

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
				$memory_detail['cover_image']=$this->circleImage($memory->getAttributes()['thumbnail']);;
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

	function circleImage($file_path)
	{

		$cover_with_icon=str_replace("_thumbnail","_thumbnail_circled",$file_path);
		$return_path=$cover_with_icon;

		if( Storage::exists($return_path))
		{
			return $return_path;
		}
		// Step 1 - Start with image as layer 1 (canvas).
		$img1 = ImageCreateFromString(Storage::get($file_path));
		$x=imagesx($img1) ;
		$y=imagesy($img1);

		// Step 2 - Create a blank image.
		$img2 = imagecreatetruecolor($x, $y);
		$bg = imagecolorallocate($img2, 255, 255, 255); // white background
		imagefill($img2, 0, 0, $bg);
		// Step 3 - Create the ellipse OR circle mask.
		$e = imagecolorallocate($img2, 0, 0, 0); // black mask color
		// Draw a ellipse mask
		// imagefilledellipse ($img2, ($x/2), ($y/2), $x, $y, $e);
		// OR
		// Draw a circle mask
		$r = $x <= $y ? $x : $y; // use smallest side as radius & center shape
		imagefilledellipse ($img2, ($x/2), ($y/2), $r, $r, $e);
		// Step 4 - Make shape color transparent
		imagecolortransparent($img2, $e);
		// Step 5 - Merge the mask into canvas with 100 percent opacity
		imagecopymerge($img1, $img2, 0, 0, 0, 0, $x, $y, 100);
		// Step 6 - Make outside border color around circle transparent
		imagecolortransparent($img1, $bg);

		//Adjust paramerters according to your image

		//	imagepng($img1,$return_path);
		$imgThumb = Image::make($img1)->stream();
		Storage::put($return_path, $imgThumb->__toString() );

		return $return_path;


	}
}
