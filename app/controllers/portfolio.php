<?php
$id = route(2);
global $portfolio;
$meta =[
    'title' => 'Pörtföy Detayı'
];
$portfolioData = $portfolio->get($id);
require View(route(1));