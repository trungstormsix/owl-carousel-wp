<?php namespace oCoder;

/** @var \Herbert\Framework\API $api */
use Herbert\Framework\Models\Post;
/**
 * Gives you access to the Helper class from Twig
 * {{ oCoder.helper('assetUrl', 'icon.png') }}
 */
$api->add('helper', function ()
{
    $args = func_get_args();
    $method = array_shift($args);

    return forward_static_call_array(__NAMESPACE__ . '\\Helper::' . $method, $args);
});

$api->add('info', function($id = 1)
{
    return Post::find($id);
});