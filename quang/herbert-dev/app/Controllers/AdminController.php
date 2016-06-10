<?php

namespace Training\Controllers;

use Herbert\Framework\Http;
use Herbert\Framework\Exceptions\HttpErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Training\Models\Training;

/**
 * Class AdminCotroller.
 */
class AdminController
{
	function index(){
		 
		
 	return view('@Training/admin/panel.twig', [
		    'training' => Training::all(),
		]);;
	}
	function configure(){
		 
		
 	return view('@Training/admin/configure.twig', [
		    'title'   => 'Create a Form',
		    'content' => 'Congrats on your panel demo view.'
		]);;
	}
	function add(Http $http){		 
       		 Training::forceCreate([
        	'title' => $http->get('title'),
        	'number' => $http->get('number')]);
        return redirect_response(panel_url('Training::mainPanel2'));
    

	}
 
 	
 
 	
	 
}