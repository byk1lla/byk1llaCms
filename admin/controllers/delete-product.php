<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$id = route(3);
global $product,$statHandler;
$userData = $product->get($id);
if ($userData) {
    $status = $product->delete($id);
    $statHandler->delete($status,"Ürün");

} else {
    $_SESSION['alert_message'] = "Ürün yok.";
    $_SESSION['alert_type'] = 'warning';

}
header("location:/admin/products");
