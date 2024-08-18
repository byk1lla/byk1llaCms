<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$id = route(3);
$meta = [
    'title' => 'Kategoriyi Düzenle'
];
$bread = [
    'title' => "Kategoriyi düzenle",
    'icon' => "bi bi-tags"
];
$categoryData = $category->getCategory($id);

if (isset($_POST["submit"])) {
//    print_r($_POST);
    $status = $category->update($_POST['name'],$id);

    $sta1tHandler = $statHandler->update($status, "Kategori");
//    print_r("handler $status");
}
checkAlerts();
require admin_view(route(2));