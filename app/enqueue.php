<?php namespace oCoder;

/** @var \Herbert\Framework\Enqueue $enqueue */
$enqueue->admin([
    'as'  => 'postsJS',
    'src' => Helper::assetUrl('/js/post.js')
]);

$enqueue->front([
    'as'  => 'frontJS',
    'src' => Helper::assetUrl('/js/post.js')
]);