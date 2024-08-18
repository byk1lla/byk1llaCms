<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
global $portfolio,$statHandler;
$meta = [
    'title' => 'Pörtföy Ekle',

];
$bread = [
    'title' => 'Pörtföy Ekle',
    'icon' => "fas fa-briefcase"
];


if (isset($_POST["submit"])) {
    $image_path = $portfolio->uploadImage($_FILES['image'], "public/uploads/services/");
    if ($image_path) {
//            print_r($image_path);

        $status = $portfolio->add($_POST["title"], $_POST["description"], $image_path);

        $statHandler->add($status,"Pörtföy");
    }
}
checkAlerts();
require admin_view(route(2));