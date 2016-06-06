<?php namespace oCoder;
/** @var \Herbert\Framework\Router $router */

$router->get([
    'as'   => 'simpleRoute',
    'uri'  => '/carousel',
    'uses' => function()
    {
        return 'Hello World';
    }
]);

//router with params
$router->get([
    'as'   => 'carouselWithParam',
    'uri'  => '/carousel/{id}',
    'uses' => function($id)
    {
        return "Carousel Id: {$id}";
    }
]);
$router->get([
    'as'   => 'carousel_url',
    'uri'  => '/carousel-controller',
    'uses' => __NAMESPACE__ . '\Controllers\Test@info'
]);

//router with params
$router->get([
    'as'   => 'carouselControllerWithParam',
    'uri'  => '/carousel-controller/{id}',
    'uses' => __NAMESPACE__ . '\Controllers\Test@getCarousel'
]);