<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$meta = [
    'title' => "Portföyler"
];
$bread = [
    'title' => 'Portföyler',
    'icon' => "bi bi-briefcase"
];

$portfolios = $portfolio->getAll();
checkAlerts();
require admin_view(route(2));