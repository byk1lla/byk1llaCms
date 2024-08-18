<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$meta = [
    'title' => "Mesajlar"
];
$bread = [
    'title' => "Müşterilerden Gelen İstekler",
    'icon' => 'fas fa-message'
];

$messages = $customer->getMessages();
checkAlerts();

require admin_view(route(2));