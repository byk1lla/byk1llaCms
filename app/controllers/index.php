<?php
$meta = [
    'title' => "Ana Sayfa",
    'description' => setting('description'),
    'keywords' => setting('keywords')
];
$portfolios = $portfolio->getAll();
$testimonials = $customer->getComments();
$services = $service->getAll();

require View("index");