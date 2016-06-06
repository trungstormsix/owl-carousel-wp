<?php namespace oCoder;

/** @var \Herbert\Framework\Shortcode $shortcode */
//$shortcode->add('UserProGetUsername', 'getUsername');
$shortcode->add(
    'oCoder-owl-carousel',
    'oCoder::getCarousel',
    ['carousel_id' => 'id']
);

$shortcode->add(
    'oCoder-owl-carousel-controller',
    'oCoder::getContentForAPI',
    ['carousel_id' => 'id']
);