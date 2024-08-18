<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$meta = [
    'title' => 'Müşteri Yorumu Ekle',
];

$bread = [
    'title' => "Müşteri Yorumu Ekle",
    'icon' => "bi bi-person-fill-gear"
];

global $customer, $statHandler;

if (isset($_POST["submit"])) {
    $status = $customer->addComment($_POST["title"], $_POST["description"]);
    $statHandler->add($status, "Müşteri Yorumu");
}
checkAlerts();
require admin_view(route(2));
