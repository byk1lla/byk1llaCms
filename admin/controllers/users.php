<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$meta = [
    'title' => "Kullanıcılar"
];
$bread = [
    'title' => 'Kullanıcılar',
    'icon' => "bi bi-people"
];

$users = $user->getAllUsers();
checkAlerts();
require admin_view(route(2));