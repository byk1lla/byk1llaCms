<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$meta = [
    'title' => 'Kategori Ekle',
];
$bread = [
    'title' => "Kategori Ekle",
    'icon' => "bi bi-tags"
];
if (isset($_POST["submit"])) {
//    print_r($_POST);
    $status = $category->add($_POST['name']);

    $sta1tHandler = $statHandler->add($status, "Kategori");
//    print_r("handler $status");
}

checkAlerts();
require admin_view(route(2));