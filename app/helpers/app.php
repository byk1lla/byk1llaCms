<?php

function controller($controllerName)
{
    return PATH ."/app/controllers/" .$controllerName . ".php";
}

function View($viewName) {
    $themePath = PATH . "/app/views/" . setting("theme");


    if (file_exists($themePath . "/unable.php")) {

        require $themePath . "/unable.php";
        exit;
    }

    return $themePath . "/$viewName.php";
}



function ErrorView($viewName)
{
    return PATH . "/app/views/". "errors" ."/$viewName.php";
}

function main_view($viewName){
    return PATH . "/app/views/$viewName.php";
}
function route($index)
{
    global $route;
    return isset($route[$index]) ? $route[$index] : false;
}

function setting($name)
{
    global $settings;
    return isset($settings[$name]) ? $settings[$name] : false;
}
function createDirectoryIfNotExists($directory) {
    if (!file_exists($directory)) {
        mkdir($directory, 0755, true); // Dizin oluştur (Windows'ta izinler genellikle etkili olmaz)
    }
}


function uploadIcon($fileName, $destination, $tmp = "", $fileSize = 0, $izinVerilenUzantilar = ['jpg', 'jpeg', 'png', 'gif', 'pdf']) {
    $geciciIsim = $tmp ? $tmp : $fileName['tmp_name'];
    $dosyaIsmi = basename($fileName);

    $dosyaUzantisi = strtolower(pathinfo($dosyaIsmi, PATHINFO_EXTENSION));

    if ($fileSize > 5000000) {
        $_SESSION["alert_message"] = "Dosya boyutu çok büyük.";
        $_SESSION["alert_type"] = "error";
        return false;
    }

    if (!in_array($dosyaUzantisi, $izinVerilenUzantilar)) {
        $_SESSION["alert_message"] = "Bu dosya türüne izin verilmiyor.";
        $_SESSION["alert_type"] = "error";
        return false;
    }

    $hedefDosya = $destination . uniqid() . "_" . $dosyaIsmi;
    $move = move_uploaded_file($geciciIsim, $hedefDosya);

    if ($move) {
        return $hedefDosya;
    } else {
        $hata = $_FILES['settings']['error'][$dosyaIsmi];
        switch ($hata) {
            case UPLOAD_ERR_INI_SIZE:
                $_SESSION["alert_message"] = 'Dosya boyutu php.ini dosyasında belirtilen upload_max_filesize değerini aşıyor.';
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $_SESSION["alert_message"] = 'Dosya boyutu HTML formunda belirtilen MAX_FILE_SIZE değerini aşıyor.';
                break;
            case UPLOAD_ERR_PARTIAL:
                $_SESSION["alert_message"] = 'Dosya sadece kısmen yüklendi.';
                break;
            case UPLOAD_ERR_NO_FILE:
                $_SESSION["alert_message"] = 'Hiçbir dosya yüklenmedi.';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $_SESSION["alert_message"] = 'Geçici dizin eksik.';
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $_SESSION["alert_message"] = 'Dosya diske yazılamadı.';
                break;
            case UPLOAD_ERR_EXTENSION:
                $_SESSION["alert_message"] = 'PHP uzantısı dosya yüklemesini durdurdu.';
                break;
            default:
                return $hedefDosya;
        }
        $_SESSION["alert_type"] = "error";
        return false;
    }
}