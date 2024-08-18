<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$meta = [
    'title' => 'Kategoriler',
];

$bread = [
    'title' => "Kategoriler",
    'icon' => "bi bi-tags"
];

$categories = $category->getAll();
checkAlerts();

require admin_view(route(2));