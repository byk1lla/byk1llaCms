<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$meta = [
    'title' => "Ürünler"
];
$bread = [
    'title' => 'Ürünler',
    'icon' => "fas fa-bag-shopping"
];

$products = $product->getAll();
checkAlerts();
require admin_view(route(2));