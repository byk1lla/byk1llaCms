<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$id = route(3);

global $portfolio, $statHandler;
$userData = $portfolio->get($id);
if ($userData) {
    $status = $portfolio->delete($id);
    echo $status;
        $statHandler->delete($status, "Portföy");

} else {
    $_SESSION['alert_message'] = "Böyle bir pörtföy yok.";
    $_SESSION['alert_type'] = 'warning';

}
header("location:/admin/portfolios");
