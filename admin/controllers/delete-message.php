<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$id = route(3);

global $customer, $statHandler;
$userData = $customer->getMessage($id);
if ($userData) {
    $status = $customer->deleteMessage($id);
    $statHandler->delete($status, "Mesaj");
} else {
    $_SESSION['alert_message'] = "Böyle bir mesaj yok.";
    $_SESSION['alert_type'] = 'warning';

}
header("location:/admin/messages");
