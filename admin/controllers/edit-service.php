<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
global $service;
$id = route(3);
$meta = [
    'title' => "Hizmeti Düzenle"
];
$bread = [
  "title" => "Hizmeti Düzenle",
    "icon" => "fas fa-cube"
];
$serviceData = $service->get($id);


if (isset($_POST["submit"])) {
    $status = $service->update($id, $_POST["title"], $_POST["description"]);
    $statHandler->update($status, "Hizmet");
    header("location: /admin/edit-service/$id");
    exit();
}
checkAlerts();
require admin_view(route(2));