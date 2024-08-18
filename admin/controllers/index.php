<?php
$meta = [
    'title' => "Yönetici Paneli",
    ];
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
require  admin_view(route(2));