<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$id = route(3);

$meta = [
    'title' => 'Yorumu Düzenle'
];
$bread = [
    'title' => "Yorumu düzenle",
    'icon' => "bi bi-person-fill-gear"
];
if (isset($_POST["submit"])) {
    $status = $customer->updateComment($id,$_POST["title"], $_POST["description"]);
    $statHandler->update($status, "Müşteri Yorumu");
    header("location: /admin/edit-comment/$id");
    exit();
}
$commentData = $customer->getComment($id);
checkAlerts();
require admin_view(route(2));