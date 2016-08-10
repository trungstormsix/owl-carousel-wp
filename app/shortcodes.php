<?php namespace oCoder;

/** @var \Herbert\Framework\Shortcode $shortcode */
//$shortcode->add('UserProGetUsername', 'getUsername');
$shortcode->add(
    'oCoder-owl-carousel',
    'oCoder::getContentForAPI',
    ['cat_id' => 'id']
);