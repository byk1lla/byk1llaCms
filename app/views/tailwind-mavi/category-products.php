<?php
require View("static/header");
// Geliştirici arkadaş için not: buranın Controller'ı Category.php
?>

<div class="container mx-auto py-12">
    <!-- Products Başlığı -->
    <section class="text-center py-20 bg-blue-800 text-white">
        <h1 class="text-5xl font-bold mb-4"><?=$categoryName?> Kategorisine Ait Ürünler</h1>
        <p class="text-xl">Bu Sayfada <?=$categoryName?> kategorisine ait ürünlerimizi inceleyebilrsiniz.<br>
            Bu Kategoriye ait toplam <?=$countProducts?> Ürün bulunmaktadır.</p>
    </section>

    <!-- Products Listesi -->
    <section class="py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($products as $product): ?>
                <a href="/product-detail/<?=$product['id']?>">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden transition transform hover:scale-105 hover:shadow-2xl">
                        <?php
                        $file_extension = pathinfo($product['image'], PATHINFO_EXTENSION);
                        $video_extensions = ['mp4', 'webm', 'ogg'];

                        if (in_array(strtolower($file_extension), $video_extensions)): ?>
                            <!-- Video Gösterimi -->
                            <video class="w-full h-48 object-cover" controls>
                                <source src="<?= $product['image'] ?>" type="video/<?= $file_extension ?>">
                                Tarayıcınız bu videoyu desteklemiyor.
                            </video>
                        <?php else: ?>
                            <!-- Resim Gösterimi -->
                            <img class="w-full h-48 object-cover" src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                        <?php endif; ?>
                        <div class="p-6">
                            <h2 class="text-2xl font-bold"><?= htmlspecialchars($product['name']) ?></h2>
                            <p class="text-gray-700"><?= htmlspecialchars($product['description']) ?></p>
                            <div class="flex justify-between items-end">
                                <p class="text-blue-500 font-bold text-lg mt-4"><?= htmlspecialchars($product['price']) ?> ₺</p>
                                <p class="text-[1vh] text-gray-400 text-right">Kategorisi: <?= htmlspecialchars($product['category_name']) ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?php
require View("static/footer");
?>
