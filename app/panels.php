<?php namespace oCoder;
/** @var \Herbert\Framework\Panel $panel */
$panel->add([
    'type'   => 'panel',
    'as'     => 'mainPanel',
    'title'  => 'Owl Carousel',
    'slug'   => 'myplugin-index',
    'icon'   => 'dashicons-format-gallery',
    'uses'   => __NAMESPACE__ . '\Controllers\AdminController@index',
    'post.add' => __NAMESPACE__ . '\Controllers\AdminController@add'
]);

$panel->add([
    'type'   => 'sub-panel',
    'parent' => 'mainPanel',
    'as'     => 'configure',
    'title'  => 'Configure',
    'slug'   => 'myplugin-configure',
    'icon'   => 'dashicons-admin-generic',
    'uses'   => __NAMESPACE__ . '\Controllers\AdminController@configure'
]);

//  $panel->add([
//     'type'   => 'panel',
//     'as'     => 'mainPanel1',
//     'title'  => 'owl Carousel',
//     'slug'   => 'myplugin-index1',
//     'icon'   => 'dashicons-media-video',
//     'uses'   => function()
//     {
//           return view('@oCoder/admin/panel.twig', [
// 		    'title'   => 'My Demo ',
// 		    'content' => 'Congrats on your panel demo view.'
// 		]);;
//     }
// ]);