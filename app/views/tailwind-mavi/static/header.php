<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0…">   <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=plugins("sweetalert2/sweetalert2.min.css")?>" />
    <script src="<?=assets("config/config.js")?>"></script>
    <link href="<?=assets("index.css")?>" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?=URL . setting('favicon')?>" />
    <title><?=$meta["title"]?> | <?=setting("title")?></title>

    <?php if(isset($meta['description'])):?>
        <meta name="description" content="<?=$meta["description"]?>" />
    <?php endif; ?>
    <?php if(isset($meta['keywords'])):?>
        <meta name="keywords" content="<?=$meta["keywords"]?>" />
    <?php endif; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.4/sweetalert2.min.js" integrity="sha512-w4LAuDSf1hC+8OvGX+CKTcXpW4rQdfmdD8prHuprvKv3MPhXH9LonXX9N2y1WEl2u3ZuUSumlNYHOlxkS/XEHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body class="bg-gray-100 poppins-medium">

<header class="bg-white shadow">
    <div class="container mx-auto flex justify-between items-center py-4">
        <!-- Logo ve Şirket Adı -->
        <div class="flex items-center">
            <a href="/" class="flex items-center">
                <img src="<?=URL . setting('nav_icon')?>" alt="Wel Studios Logo" class="h-12 w-12 mr-3">
                <span class="text-2xl font-semibold text-gray-800"><?=setting('title')?></span>
            </a>
        </div>

        <!-- Hamburger Menu Button (Mobil İçin) -->
        <div class="block md:hidden">
            <button id="menu-btn" class="text-gray-800 hover:text-blue-500 focus:outline-none">
                <i class="fas fa-bars fa-2x"></i>
            </button>
        </div>

        <!-- Navbar (Desktop ve Mobil için) -->
        <nav id="menu" class="fixed top-0 left-0 w-full h-screen bg-white flex flex-col justify-center items-center max-h-0 overflow-hidden transition-all duration-500 ease-in-out md:relative md:max-h-full md:h-auto md:flex-row md:bg-transparent md:justify-end md:space-x-4">
            <ul class="space-y-4 md:space-y-0 text-center md:flex">
                <li><a href="/" class="block mx-1 text-gray-800 hover:text-blue-500 transition duration-300">Ana Sayfa</a></li>
                <li><a href="/category" class="mx-1 block text-gray-800 hover:text-blue-500 transition duration-300">Kategorilerimiz</a></li>
                <li><a href="/products" class="mx-1 block text-gray-800 hover:text-blue-500 transition duration-300">Ürünlerimiz</a></li>
                <li><a href="/about-us" class="mx-1 block text-gray-800 hover:text-blue-500 transition duration-300">Hakkımızda</a></li>
                <li><a href="/contact" class="mx-1 block text-gray-800 hover:text-blue-500 transition duration-300">İletişim</a></li>
            </ul>
        </nav>
    </div>
</header>



