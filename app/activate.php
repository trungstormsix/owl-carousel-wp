<?php

/** @var  \Herbert\Framework\Application $container */
/** @var  \Herbert\Framework\Http $http */
/** @var  \Herbert\Framework\Router $router */
/** @var  \Herbert\Framework\Enqueue $enqueue */
/** @var  \Herbert\Framework\Panel $panel */
/** @var  \Herbert\Framework\Shortcode $shortcode */
/** @var  \Herbert\Framework\Widget $widget */
 
 
use Illuminate\Database\Capsule\Manager as Capsule;
//create carousels table
// Capsule::schema()->create('carousels', function($table)
// {
//     $table->increments('id');
//     $table->string('title');
// });
Capsule::schema()->create('ocoder_demo', function($table)
{
    $table->increments('id');
    $table->string('name');
    $table->string('content');
    $table->string('company');
    $table->text('image_link');
});