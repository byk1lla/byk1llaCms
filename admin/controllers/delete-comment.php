<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$id = route(3);
global $customer,$statHandler;
$userData = $customer->getComment($id);
if ($userData) {
    $status = $customer->deleteComment($id);
    $statHandler->delete($status,"Müşteri Yorumu");

} else {
    $_SESSION['alert_message'] = "Müşteri Yorumu yok.";
    $_SESSION['alert_type'] = 'warning';

}
header("location:/admin/comments");
