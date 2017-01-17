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
       if($http->has('images'))
        {
            $images = ($http->get("images"));           
        }

        $slider = oCoder::find($id);
        $images=json_decode($slider->image_link);
        return  $this->_loadTestimonial($slider, $images);
    }

    public function preview($id, Http $http)
    {
       if($http->has('images') || $http->get("name"))
        {
            $slider = oCoder::find($id);
            $slider->name = $http->get("name");
            $slider->content = $http->get("content");
            $images = ($http->get("images"));
             
        }else{
            $slider = oCoder::find($id);
            $images=json_decode($slider->image_link);
        }

        
       return view('@oCoder/site/preview.twig', [
            'slider'   => $slider,
            'images'   => $images            
        ]);
    }
    /**
    * for API call (short code)
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

    private function _loadTestimonial($slider, $images){
        return view('@oCoder/site/example.twig', [
            'slider'   => $slider,
            'images'   => $images,
            'frontJS'  => Helper::assetUrl('/js/responsive_testemonial_carousel.js'),
            'css' => Helper::assetUrl('/css/responsive_testemonial_carousel.css')
        ]);
    }
}