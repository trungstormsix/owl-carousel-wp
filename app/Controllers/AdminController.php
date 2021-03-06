<?php

namespace oCoder\Controllers;

use Herbert\Framework\Http;
use Herbert\Framework\Exceptions\HttpErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use oCoder\Models\oCoder;
use oCoder\Helper;

/**
 * Class AdminCotroller.
 */
class AdminController
{

	/**
	**  list all Slideshow
	**/
	function index(){
		
 		return view('@oCoder/admin/panel.twig', [
		   	'ocoder' => oCoder::all(),
		]);;
	}
 
 	
 	/**
 	*   save carousel slideshow to database
 	**/
 	function add(Http $http)
 	{
 		if(! $http->get('id')){
 			 $slide = new oCoder;
 		}else{
 			$slide = oCoder::find($http->get('id'));

 		}
 		$slide->name = $http->get('name');
		$slide->content = $http->get('content');
		$slide->image_link = $http->get('image_link');
		$slide->save();
 		 
 		return redirect_response(panel_url('oCoder::editSlide', ['id'=> $slide->id ]));
 	}

 	/**
     * Show the post for the given id.
     */
    function getCarousel(Http $http)
    {
        
        $id = $http->get("id");
         
        $slider = oCoder::find($id);
        $arrItems=json_decode($slider->image_link);
 			
        return view('@oCoder/admin/edit_slideshow.twig', [
            'arrItems' => $arrItems,
            'slider'   => $slider,
            'get_site_url' => get_site_url(),
            'frontJS'  => Helper::assetUrl('/js/responsive_testemonial_carousel.js'),
            'css' => Helper::assetUrl('/css/responsive_testemonial_carousel.css')
        ]);
    }
	 function delete(Http $http,$id){
	 	$id = $http->get("id");
	 	$slider = oCoder::find($id);
	 	$slider->delete();

	 	return redirect_response(panel_url('oCoder::mainPanel'));
}

	function configure(){
 		return view('@oCoder/admin/configure.twig',[
 			
 		]);;
 	}
}