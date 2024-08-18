<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$meta = [
    'title' => "Hizmetler"
];
$bread = [
    'title' => 'Hizmetler',
    'icon' => "fas fa-cube"
];

$services = $service->getAll();
checkAlerts();
require admin_view(route(2));