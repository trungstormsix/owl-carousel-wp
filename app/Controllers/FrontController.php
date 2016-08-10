<?php

namespace oCoder\Controllers;

use Herbert\Framework\Http;
use Herbert\Framework\Exceptions\HttpErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Herbert\Framework\Models\Post;
use oCoder\Helper;
use oCoder\Models\oCoder;

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
        $slider = oCoder::find($id);
        $images=json_decode($slider->image_link);
        return view('@oCoder/site/api.twig', [
        'assetUrl'=>  Helper::assetUrl(),
        'slider'   => $slider,
        'images'   => $images
        ]);
    }
}