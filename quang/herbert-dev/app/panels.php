<?php namespace Training;

/** @var \Herbert\Framework\Panel $panel */

$panel->add([
    'type'   => 'panel',
    'as'     => 'mainPanel2',
    'title'  => 'Training',
    'rename' => 'Dashboard',
    'slug'   => 'training-index2',
    'uses'   => __NAMESPACE__ . '\Controllers\AdminController@index',
    'post.add' => __NAMESPACE__.'\Controllers\AdminController@add'
]);

$panel->add([
    'type'   => 'sub-panel',
    'parent' => 'mainPanel2',
    'as'     => 'configure',
    'title'  => 'Configure',
    'slug'   => 'training-configure2',
    'uses'   => __NAMESPACE__ . '\Controllers\AdminController@configure',
]);