<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
global $service,$statHandler;
$meta = [
    'title' => 'Hizmet Ekle',
];
$bread = [
    'title' => 'Hizmet Ekle',
    'icon' => "fas fa-cube"
];


if (isset($_POST["submit"])) {
        $status = $service->add($_POST["title"], $_POST["description"]);
//        print_r($status);
        $statHandler->add($status,"Hizmet");
}
checkAlerts();
require admin_view(route(2));