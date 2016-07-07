<?php

namespace oCoder\Controllers;

use Herbert\Framework\Http;
use Herbert\Framework\Exceptions\HttpErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Herbert\Framework\Models\Post;
use oCoder\Helper;
/**
 * Class FrontController.
 */
class FrontController
{
	function index(){
		//js 

  		return view('@oCoder/site/example.twig', [
		    'title'   => 'My Demo ',
            'js'      =>  Helper::assetUrl('/js/responsive_testemonial_carousel.js'),
            'css'     => Helper::assetUrl('/css/responsive_testemonial_carousel.css'),   
            'assetUrl'=>  Helper::assetUrl(),
		    'content' => 'Congrats on your demo view.'
		]);
	}
 
    /**
     * Show the post for the given id.
     */
    public function getCarousel($id, Http $http)
    {
        
        $post = Post::find($id);

        if(!$post)
        {
            return response('Post not found', 404);
        }

        if($http->has('json'))
        {
            return json_response($post);
        }
        // var_dump($post);
        return view('@oCoder/site/example.twig', [
		    'title'   => 'My Demo '.$id.' '.$post->post_title,
		    'content' => 'Congrats on your demo view.'
		]);
    }


    /**
    * for API call
    **/
    public function getContentForAPI($id){
          return view('@oCoder/site/api.twig', [
            'title'   => 'My Demo '.$id,
            'assetUrl'=>  Helper::assetUrl(),
            'content' => 'Congrats api demo view.'
        ]);
    }
}