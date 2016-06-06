<?php

namespace oCoder\Controllers;

use Herbert\Framework\Http;
use Herbert\Framework\Exceptions\HttpErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class Test.
 */
class Test
{
	function info(){
		return view('@oCoder/demo/example.twig', [
		    'title'   => 'My Demo',
		    'content' => 'Congrats on your demo view.'
		]);
	}

}