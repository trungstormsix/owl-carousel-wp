<?php namespace oCoder;
/** @var \Herbert\Framework\Panel $panel */
$panel->add([
    'type'   => 'panel',
    'as'     => 'mainPanel',
    'title'  => 'Owl Carousel',
    'rename' => 'SlideShows',
    'slug'   => 'myplugin-index',
    'icon'   => 'dashicons-format-gallery',
    'uses'   => __NAMESPACE__ . '\Controllers\AdminController@index',
    'post.add' => __NAMESPACE__ . '\Controllers\AdminController@add',
    'delete' => __NAMESPACE__ . '\Controllers\AdminController@delete'
]);
$panel->add([
    'type'   => 'sub-panel',
    'parent' => 'mainPanel',
    'as'     => 'editSlide',
    'title'  => 'Add SlideShow',
    'slug'   => 'edit-slide',
    'icon'   => 'dashicons-admin-generic',
    'uses'   => __NAMESPACE__ . '\Controllers\AdminController@getCarousel'
]);

// $panel->add([
//     'type'   => 'sub-panel',
//     'parent' => 'mainPanel',
//     'as'     => 'configure',
//     'title'  => 'Configure',
//     'slug'   => 'myplugin-configure',
//     'icon'   => 'dashicons-admin-generic',
//     'uses'   => __NAMESPACE__ . '\Controllers\AdminController@configure'
// ]);

