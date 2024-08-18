<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$meta = [
    'title' => 'Müşteri Yorumları',
];

$bread = [
    'title' => "Müşteri Yorumları",
    'icon' => "bi bi-person-fill-gear"
];
$comments = $customer->getComments();
checkAlerts();

require admin_view(route(2));