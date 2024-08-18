<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
global $product,$statHandler;
$meta = [
    'title' => 'Ürün Ekle',

];
$bread = [
    'title' => 'Ürün Ekle',
    'icon' => "fas fa-bag-shopping"
];
$categories = $category->getAll();

if (isset($_POST["submit"])) {
    $image_path = $product->uploadImage($_FILES['image'], "public/uploads/products/");
    if ($image_path) {
//            print_r($image_path);

        $status = $product->add($_POST["name"], $_POST["description"], $image_path,$_POST["price"],$_POST["category_id"]);

        $statHandler->add($status,"Ürün");
    }
}
checkAlerts();
require admin_view(route(2));