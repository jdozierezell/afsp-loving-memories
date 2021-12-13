<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

abstract  class BaseModel extends Model {
	public function getPublicUrl($val)
	{
		if($val)
		{
			if(config('filesystems.default')=='s3')
			{
				return Storage::temporaryUrl(
					$val,
					now()->addMinutes(10),
					['ResponseContentType' => 'application /octet-stream']
				);
			}
			return url($val);
		}
	}
}

