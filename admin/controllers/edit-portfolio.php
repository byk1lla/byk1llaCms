<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$id = route(3);
global $portfolio, $statHandler;
$portfolioData = $portfolio->get($id);
$meta = [
    'title' => 'Pörtföy - ' . ucfirst($portfolioData['title'])
];
$bread = [
    'title' => ucfirst($portfolioData['title']) . " adlı pörtföyü düzenle",
    'icon' => "fas fa-user-pen"
];


if ($portfolioData) {
    if (isset($_POST["submit"])) {

        $title = $_POST["title"];
        $description = $_POST["description"];
        $destination = $_POST["destination"];
        $img = "";
        if ($_FILES["image"]["error"] == 0) {


            $img = URL . $portfolio->uploadImage($_FILES['image'], "public/uploads/services/");

        }
        else{
            $img = $destination;
        }
//        $data = [
//            'title' => $title,
//            'description' => $description,
//            'image' => $img,
//        ];
//
//        print_r($data);

        $status = $portfolio->update($id, $title,   $img,$description);
//        echo $status;
        $statHandler->update($status,"Portföy");
        header("location: /admin/edit-portfolio/$id");
        exit();

    }
} else {
    $_SESSION['alert_message'] = "Pörtföy bulunamadı!";
    $_SESSION['alert_type'] = 'error';
}
checkAlerts();
require admin_view(route(2));