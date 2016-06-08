<?php namespace oCoder;

/** @var \Herbert\Framework\Enqueue $enqueue */
$enqueue->admin([
    'as'  => 'postsJS',
    'src' => Helper::assetUrl('/js/admin.js')
]);

/**
** site script
**/
        wp_enqueue_script('jquery');

$enqueue->front([
    'as'  => 'frontJS',
    'src' => Helper::assetUrl('/js/responsive_testemonial_carousel.js')
]);

$enqueue->front([
    'as'  => 'frontCSS',
    'src' => Helper::assetUrl('/css/responsive_testemonial_carousel.css')
]);