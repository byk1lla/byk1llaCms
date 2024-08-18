<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$meta["title"]?> | <?=setting("title")?></title>

    <link rel="shortcut icon" href="<?=assets('/images/favicon.svg')?>" type="image/x-icon">
    <link rel="stylesheet" href="<?=admin_pub()?>/compiled/css/app.css">
    <link rel="stylesheet" href="<?=admin_pub()?>/compiled/css/app-dark.css">
    <link rel="stylesheet" href="<?=admin_pub()?>/compiled/css/auth.css">
    <link rel="stylesheet" href="<?=admin_pub()?>/extensions/toastify-js/src/toastify.css">
    <link rel="stylesheet" href="<?=admin_pub()?>/extensions/sweetalert2/sweetalert2.min.css">
<!--    <link rel="stylesheet" href="--><?php //=admin_pub("/main.css")?><!--">-->
</head>

<body class="overflow-hidden">

<script src="<?=admin_pub()?>/static/js/initTheme.js"></script>
<div id="auth">

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo ">
                    <a href="/"><img src="<?=admin_pub('/images/logo.png')?>" alt="Wel Studios Logo"> <span class="text-success font-bold">WEL STUDIOS</span></a>
                </div>
                <h1 class="auth-title">Giriş Yap</h1>
                <p class="auth-subtitle mb-5">Sistem Yöneticiniz tarafından verilen bilgilerle giriş yapınız.</p>

                <form method="POST" action="">
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl"  name="username" placeholder="Kullanıcı Adı">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" name="password" class="form-control form-control-xl" placeholder="Şifre">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                            Beni hatırla
                        </label>
                    </div>
                    <input type="hidden" name="submit" value="1">
                    <button class="btn btn-success btn-block btn-lg shadow-lg mt-5">Giriş Yap</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                      <p><a class="font-bold" href="./forgot-password">Şifremi Unuttum</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right" class="bg-success">
                <!-- Sağ tarafa uygun bir görsel ekleyebilirsiniz -->
            </div>
        </div>
    </div>

</div>
<?php
checkAlerts();
?>
<script src="<?=admin_pub()?>/extensions/sweetalert2/sweetalert2.min.js"></script>>
<script src="<?=admin_pub()?>/static/js/pages/sweetalert2.js"></script>>
</body>

</html>
