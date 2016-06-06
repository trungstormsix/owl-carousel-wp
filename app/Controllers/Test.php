<?php

namespace oCoder\Controllers;

use Herbert\Framework\Http;
use Herbert\Framework\Exceptions\HttpErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Herbert\Framework\Models\Post;
 
/**
 * Class Test.
 */
class Test
{
	function info(){
		//get url
		echo route_url('oCoder::carousel_url');
 		return view('@oCoder/site/example.twig', [
		    'title'   => 'My Demo ',
		    'content' => 'Congrats on your demo view.'
		]);
	}
 
	 



 
    /**
     * Show the post for the given id.
     */
    public function getCarousel($id, Http $http)
    {
        // $post = Post::find($id);

        // if(!$post)
        // {
        //     return response('Post not found', 404);
        // }

        // if($http->has('json'))
        // {
        //     return json_response($post);
        // }

        return view('@oCoder/site/example.twig', [
		    'title'   => 'My Demo '.$id,
		    'content' => 'Congrats on your demo view.'
		]);
    }
}