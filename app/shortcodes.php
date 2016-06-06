<?php namespace oCoder;

/** @var \Herbert\Framework\Shortcode $shortcode */
//$shortcode->add('UserProGetUsername', 'getUsername');
$shortcode->add(
    'oCoder-owl-carousel',
    'oCoder::getCarousel',
    ['carousel_id' => 'id']
);