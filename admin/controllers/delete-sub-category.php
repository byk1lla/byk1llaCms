<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$id = route(3);
global $category,$statHandler;
$userData = $category->getCategory($id);
if ($userData) {
    $status = $category->delete($id);
    $statHandler->delete($status,"Kategori");

} else {
    $_SESSION['alert_message'] = "Kategori yok.";
    $_SESSION['alert_type'] = 'warning';

}
checkAlerts();
header("location:/admin/categories");
