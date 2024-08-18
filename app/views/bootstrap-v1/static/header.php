<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=themeassets("index.css")?>">
    <link rel="icon" type="image/png" href="<?=assets("images/logo.png")?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

    </style>
    <title><?=$meta["title"]?> | <?=setting("title")?></title>
</head>
<body class="bg-light">

<!-- Header ve Navbar -->
<header class="bg-white shadow-sm">
    <div class="container d-flex justify-content-between align-items-center py-3">
        <div class="d-flex align-items-center">
            <img src="<?=assets("/images/logo.png")?>" alt="Wel Studios Logo" class="me-3" style="height: 48px;">
            <span class="h4 mb-0 text-dark"><?=setting('title')?></span>
        </div>
        <!-- Navbar -->
        <nav>
            <ul class="navbar-nav d-flex flex-row">
                <li class="nav-item"><a href="/" class="nav-link text-dark">Ana Sayfa</a></li>
                <li class="nav-item"><a href="/about-us" class="nav-link text-dark">Hakkımızda</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link text-dark">İletişim</a></li>
            </ul>
        </nav>
    </div>
</header>




