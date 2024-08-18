<?php
// Hata mesajını PHP üzerinden alıyoruz
$errorMessage = isset($errorMessage) ? $errorMessage : 'Beklenmedik bir hata oluştu.';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hata Sayfası</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-r from-red-500 to-pink-500 text-white">
    <div class="text-center">
        <!-- Hata İkonu -->
        <div class="text-7xl mb-4">
            <i class="fas fa-exclamation-triangle"></i>
        </div>

        <!-- Başlık ve Mesaj -->
        <h1 class="text-6xl font-bold mb-4">Haydaa!</h1>
        <h2 class="text-3xl font-semibold mb-6">Yolunda gitmeyen bir şeyler var...</h2>
        <p class="text-lg mb-6"><?= htmlspecialchars($errorMessage) ?></p>

        <!-- Ana sayfaya dön butonu -->
        <a href="/" class="bg-white text-gray-800 px-6 py-3 rounded-full font-semibold shadow hover:bg-gray-100">
            Ana Sayfaya Dön
        </a>
        <pre>
            <p class="text-[2vh] text-gray-200"><?=$detail["message"]?> - <?=$detail["type"]?></p> on <p><?=$detail['file']?> line <?=$detail['line']?></p>
        </pre>
    </div>
</div>

</body>
</html>
