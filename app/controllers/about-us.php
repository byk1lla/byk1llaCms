<?php
$meta = [
    'title' => "Hakkımızda",
    'description' => setting('description'),
    'keywords' => setting('keywords')
];
$text = setting("about-us");

require View("about-us");