
<?php
if(!isset($_SESSION["username"])){
    header("location:/admin/login");
}
$themes = [];
foreach (glob(PATH . "/app/views/*", GLOB_ONLYDIR) as $folder) {
    if (is_dir($folder . "/static")) {
        $folder_name = basename($folder);

        $disabled = is_file($folder . "/unable.php");

        $themes[] = [
            'name' => $folder_name,
            'disabled' => $disabled
        ];
    }
}

if (post('submit') !== null) {
    $html = "<?php " . PHP_EOL . PHP_EOL;

    if (isset($_FILES['settings']['name']['favicon'])) {
        $favicon_path = uploadIcon(
            $_FILES['settings']['name']['favicon'],
            'public/uploads/settings/',
            $_FILES['settings']['tmp_name']['favicon'],
            $_FILES['settings']['size']['favicon']
        );
        if ($favicon_path) {
            $ic = str_replace(URL, '', $favicon_path);
            $html .= '$settings["favicon"]="' . $ic . '";' . PHP_EOL;
        } else {
            print_r($favicon_path);
        }
    }

    if (isset($_FILES['settings']['name']['nav_icon'])) {
        $nav_icon_path = uploadIcon(
            $_FILES['settings']['name']['nav_icon'],
            'public/uploads/settings/',
            $_FILES['settings']['tmp_name']['nav_icon'],
            $_FILES['settings']['size']['nav_icon']
        );
        if ($nav_icon_path) {
            $ic = str_replace(URL, '', $nav_icon_path);
            $html .= '$settings["nav_icon"]="' . $ic . '";' . PHP_EOL;
        } else {
            print_r($nav_icon_path);
        }

    }
    foreach (post("settings") as $key => $value) {
        $html .= '$settings["' . $key . '"]="' . $value . '";' . PHP_EOL;
    }

//    print_r($html);
//
    $put = file_put_contents(PATH . '/app/settings.php', $html);
    if ($put > 0) {
        $_SESSION['toast_message'] = 'Ayarlarınız başarıyla kaydedildi.';
        $_SESSION['toast_type'] = 'success';
    } else {
        $_SESSION['toast_message'] = 'Bir hata oluştu, lütfen tekrar deneyin.';
        $_SESSION['toast_type'] = 'error';
    }

    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}


$meta = [
    'title' => "Ayarlar"
];
$bread = [
    'title' => 'Ayarlar',
    'icon' => "bi bi-gear-wide-connected"
];

checkAlerts();
require admin_view("settings");

?>