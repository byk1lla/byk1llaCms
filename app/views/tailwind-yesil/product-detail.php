<?php
require View("static/header");
?>

<div class="container mx-auto py-12">
    <!-- Breadcrumb -->
    <nav class="bg-white p-3 rounded-lg shadow-lg mb-6">
        <ol class="list-reset flex text-gray-700">
            <li><a href="/products" class="text-green-500 hover:underline">Ürünlerimiz</a></li>
            <li><span class="mx-2">/</span></li>
            <li><a href="/category/<?= $categoryData['id'] ?>" class="text-green-500 hover:underline"><?= htmlspecialchars($categoryData['name']) ?></a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-500"><?= htmlspecialchars($productData['name']) ?></li>
        </ol>
    </nav>

    <!-- Product Başlığı -->
    <section class="text-center py-20 bg-green-500 text-white">
        <h1 class="text-5xl font-bold mb-4"><?= htmlspecialchars($productData['name']) ?></h1>
        <p class="text-xl"><?= htmlspecialchars($productData['description']) ?></p>
    </section>

    <!-- Product İçeriği -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <?php
            $file_extension = pathinfo($productData['image'], PATHINFO_EXTENSION);
            $video_extensions = ['mp4', 'webm', 'ogg'];

            if (in_array(strtolower($file_extension), $video_extensions)): ?>
                <video class="w-full h-auto" controls>
                    <source src="<?= $productData['image'] ?>" type="video/<?= $file_extension ?>">
                    Tarayıcınız bu videoyu desteklemiyor.
                </video>
            <?php else: ?>
                <img class="w-full h-auto" src="<?=$productData['image'] ?>" alt="<?= htmlspecialchars($productData['name']) ?>">
            <?php endif; ?>

            <div class="p-6">
                <h2 class="text-3xl font-semibold mb-4"><?= htmlspecialchars($productData['name']) ?></h2>
                <p class="text-gray-700 text-lg mb-4"><?= htmlspecialchars($productData['description']) ?></p>
                <p class="text-green-500 font-bold text-2xl"><?= htmlspecialchars($productData['price']) ?> ₺</p>
            </div>
        </div>
    </section>

    <div class="text-center mt-6">
        <a href="/products" class="inline-block bg-green-500 text-white py-2 px-4 rounded-lg shadow-lg hover:bg-green-600">Tüm Ürünler</a>
    </div>
</div>

<?php
require View("static/footer");
?>
