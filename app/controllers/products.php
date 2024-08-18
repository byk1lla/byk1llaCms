<?php
$id = route(2);
$meta =[
    'title' => 'Ürünlerimiz'
];
$products = $product->getAll();
require View(route(1));