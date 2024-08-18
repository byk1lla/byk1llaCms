<?php
$meta = [
    "title" => "Yönetici Girişi"
];
if(isset($_SESSION["username"])){
    header("location:/admin/");
}
if(isset($_POST["submit"])){
    $status  = $user->login($_POST["username"], $_POST["password"]);
//    print_r($status);
    if ($status === true) {
        header("location:/admin");
    }else if($status == "empty"){
        $_SESSION['alert_message'] = 'Lütfen Alanları Doldurun!';
        $_SESSION['alert_type'] = 'error';
    }else{
        $_SESSION['alert_message'] = 'Hatalı Kullanıcı Adı Veya Şifre';
        $_SESSION['alert_type'] = 'error';
    }

}
require admin_view("login");