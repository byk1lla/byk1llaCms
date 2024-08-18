<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$id = route(3);
global $product, $statHandler;
$productData = $product->get($id);
$meta = [
    'title' => 'Ürün - ' . ucfirst($productData['name'])
];
$bread = [
    'title' => ucfirst($productData['name']) . " adlı pörtföyü düzenle",
    'icon' => "fas fa-user-pen"
];

$categories = $category->getAll();
if ($productData) {
    if (isset($_POST["submit"])) {

        $title = $_POST["title"];
        $description = $_POST["description"];
        $destination = $_POST["destination"];
        $price = $_POST["price"];
        $category_id = $_POST["category_id"];
        $img = "";
        if ($_FILES["image"]["error"] == 0) {

            $img = URL . $product->uploadImage($_FILES['image'], "public/uploads/products/");

        }
        else{
            $img = $destination;
        }
//        $data = [
//            'title' => $title,
//            'description' => $description,
//            'image' => $img,
//        ];
//
//        print_r($data);

        $status = $product->update($id, $title, $img,$description,$price,$category_id);
//        echo $status;
        $statHandler->update($status,"Ürün");
        header("location: /admin/edit-products/$id");
        exit();

    }
} else {
    $_SESSION['alert_message'] = "Pörtföy bulunamadı!";
    $_SESSION['alert_type'] = 'error';
}
checkAlerts();
require admin_view(route(2));