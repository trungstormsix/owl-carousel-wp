<?php namespace oCoder;

$router->get([
    'as'   => 'info',
    'uri'  => '/sip/info',
    'uses' => __NAMESPACE__ . '\Controllers\Test@info'
]);
/** @var \Herbert\Framework\Router $router */
