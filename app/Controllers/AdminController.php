<?php

namespace oCoder\Controllers;

use Herbert\Framework\Http;
use Herbert\Framework\Exceptions\HttpErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class AdminCotroller.
 */
class AdminController
{
	function index(){
		 
		 
 		return view('@oCoder/admin/panel.twig', [
		    'title'   => 'My Demo Admin Controller',
		    'content' => 'Congrats on your panel demo view.'
		]);;
	}
 
 	function configure(){
 		
 	}
	 
}