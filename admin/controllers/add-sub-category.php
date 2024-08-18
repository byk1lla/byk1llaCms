<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$meta = [
    'title' => 'Alt Kategori Ekle',
];

$bread = [
    'title' => "Alt Kategori ekle",
    'icon' => "bi bi-tags"
];
$categories = $category->getAll();
if (isset($_POST["submit"])) {
////    print_r($_POST);
    $status = $category->addSubCategory($_POST['category_id'],$_POST['name']);
//    print_r($status);
    $statHandler->add($status, "Alt Kategori");
}

checkAlerts();
require admin_view(route(2));