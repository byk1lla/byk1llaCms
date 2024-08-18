<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$id = route(3);
global $user,$statHandler;
$userData = $user->getUserById($id);
if ($userData) {
    $status = $user->delete($id);
    $statHandler->delete($status,"Kullanıcı");

} else {
    $_SESSION['alert_message'] = "Kullanıcı yok.";
    $_SESSION['alert_type'] = 'warning';

}
header("location:/admin/users");
