<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$id = route(3);

global $service, $statHandler;
$userData = $service->get($id);
if ($userData) {
    $status = $service->delete($id);
    echo $status;
    $statHandler->delete($status, "Hizmet");

} else {
    $_SESSION['alert_message'] = "Böyle bir Hizmet yok.";
    $_SESSION['alert_type'] = 'warning';

}
header("location:/admin/services");
