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
		$slide->company = $http->get('company');
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
        
 			$objectJson=json_decode($slider->image_link);
 			var_dump($objectJson);
 			echo $slider->image_link;
 			exit;
        return view('@oCoder/admin/edit_slideshow.twig', [
            'slider'   => $slider,
            'content' => 'Congrats on your demo view.'
        ]);
    }
	 


	function configure(){
 		return view('@oCoder/admin/configure.twig',[
 			
 		]);;
 	}
}