<?php

namespace oCoder\Controllers;

use Herbert\Framework\Http;
use Herbert\Framework\Exceptions\HttpErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use oCoder\Models\oCoder;
/**
 * Class AdminCotroller.
 */
class AdminController
{
	function index(){
		
 		return view('@oCoder/admin/panel.twig', [
		   	'ocoder' => oCoder::all(),
		]);;
	}
 
 	function configure(){
 		return view('@oCoder/admin/configure.twig',[
 			
 		]);;
 	}

 	function add(Http $http)
 	{
 		oCoder::forceCreate([
 			'name' => $http->get('name'),
 			'content' => $http->get('content'),
 			'company' => $http->get('company'),
 			'image_link' => $http->get('image_link')
 		]);
 	return redirect_response(panel_url('oCoder::mainPanel'));
 	}
	 
}