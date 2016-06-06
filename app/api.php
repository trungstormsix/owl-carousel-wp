<?php namespace oCoder;

/** @var \Herbert\Framework\API $api */
use Herbert\Framework\Models\Post;
/**
 * Gives you access to the Helper class from Twig
 * {{ oCoder.helper('assetUrl', 'icon.png') }}
 */

//using controller
use oCoder\Controllers\Test;

$api->add('helper', function ()
{
    $args = func_get_args();
    $method = array_shift($args);

    return forward_static_call_array(__NAMESPACE__ . '\\Helper::' . $method, $args);
});


/*get carousel*/
$api->add('getCarousel', function($id = "")
{
	return (new Test)->getContentForAPI($id);
    // return "Carousel ".$id;
});

/*api call controller*/
$api->add('getContentForAPI', function($id)
{
    return (new Test)->getContentForAPI($id);
});