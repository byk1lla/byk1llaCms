<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$id = route(3);
global $user, $statHandler;
$userData = $user->getUserById($id);
$meta = [
    'title' => 'Kullanıcı - ' . ucfirst($userData['username'])
];
$bread = [
    'title' => ucfirst($userData['username']) . " adlı kişiyi düzenle",
    'icon' => "fas fa-user-pen"
];


if ($userData) {
    if (isset($_POST["submit"])) {
        $oldPassword = $_POST['old_password'];
        $newPassword = $_POST['new_password'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        if (password_verify($oldPassword, $userData['password'])) {

            $update = $user->update($username, $email, $newPassword);
            $statHandler->update($update, "Kullanıcı");
            header("location: /admin/edit-user/$id");
            exit();
        } else {
            $_SESSION['alert_message'] = "Mevcut şifreniz yanlış!";
            $_SESSION['alert_type'] = 'warning';
        }
    }
} else {
    $_SESSION['alert_message'] = "Kullanıcı bulunamadı!";
    $_SESSION['alert_type'] = 'error';
}
checkAlerts();
require admin_view(route(2));
