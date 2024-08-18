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
$categories = $category->getAll();
checkAlerts();

require admin_view(route(2));