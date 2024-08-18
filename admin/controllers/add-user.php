<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$meta = [
    'title' => 'Kullanıcı Ekle',
];
$bread = [
    'title' => 'Kullanıcı Ekle',
    'icon' => "fas fa-user-plus"
];


if (isset($_POST["submit"])) {
    $status = $user->add($_POST["username"], $_POST["email"], $_POST["password"]);
//    print_r($status);

    $statHandler->add($status,"Kullanıcı");
}
checkAlerts();
require admin_view("add-user");