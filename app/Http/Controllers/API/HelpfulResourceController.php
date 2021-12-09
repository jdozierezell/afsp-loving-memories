<?php

namespace App\Http\Controllers\API;



use App\Models\HelpfulResource;

use Illuminate\Http\Request;
/**
 * @group Helpful Resources management
 *
 * APIs for Helpful Resources
 */
class HelpfulResourceController extends APIBaseController
{
	function  latest(Request $request)
	{
		list($offset,$limit)=$this->getPaginationFromRequest($request);

		$helpful_resources=HelpfulResource::select(['name','url','image'])->orderBy('order_by')->offset($offset)->limit($limit)->get();
		$response = ['helpful_resources' => $helpful_resources];
		return response($response);
	}


}
