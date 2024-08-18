<?php
require View("static/header");
?>

    <div class="container mx-auto py-12">
        <!-- Kategoriler Başlığı -->
        <section class="text-center py-20 bg-green-500 text-white">
            <h1 class="text-5xl font-bold mb-4"><?=setting('categories_title')?></h1>
            <p class="text-xl"><?=setting('categories_description')?></p>
        </section>

        <!-- Üst Kategoriler -->
        <section class="py-12">
            <h2 class="text-3xl font-bold text-center mb-8">Üst Kategoriler</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $hasParentCategory = false;
                foreach ($categories as $categoryData):
                    if ($categoryData['parent_id'] == 0): // Üst kategori kontrolü
                        $hasParentCategory = true;
                        ?>
                        <a href="/category/<?=$categoryData['id']?>">

                            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition transform hover:scale-105 hover:shadow-2xl">
                                <div class="p-6">
                                    <h2 class="text-2xl font-bold"><?= htmlspecialchars($categoryData['name']) ?></h2>
                                    <p class="text-green-500 font-bold text-lg mt-4">Toplam Bulunan Ürün: <?=   $product->countByCategory($categoryData['id']);
                                        ?></p>
                                    <p class="text-green-500 font-bold text-sm mt-4">Toplam Alt Kategori: <?=   $category->getChildsCount($categoryData['id']);
                                        ?></p>
                                    <p class="text-gray-300 font-bold text-[1.3vh] mt-4">Oluşturulma: <?= htmlspecialchars($categoryData['created_at']); ?></p>
                                </div>
                            </div>
                        </a>
                    <?php
                    endif;
                endforeach;

                if (!$hasParentCategory): ?>
                    <p class="text-center text-red-500">Üst kategori bulunmamaktadır.</p>
                <?php endif; ?>
            </div>
        </section>

        <!-- Alt Kategoriler -->
        <section class="py-12">
            <h2 class="text-3xl font-bold text-center mb-8">Alt Kategoriler</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $hasChildCategory = false;
                foreach ($categories as $categoryData):
                    if ($categoryData['parent_id'] != 0):
                        $hasChildCategory = true;
                        ?>
                        <a href="/category/<?=$categoryData['id']?>">
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition transform hover:scale-105 hover:shadow-2xl">
                                <div class="p-6">
                                    <h2 class="text-2xl font-bold"><?= htmlspecialchars($categoryData['name']) ?></h2>
                                    <p class="text-gray-700">Ana Kategori İsmi: <?= $category->getCategoryName($categoryData['parent_id']) ?></p>
                                    <p class="text-green-500 font-bold text-lg mt-4">Toplam Bulunan Ürün: <?=   $product->countByCategory($categoryData['id']);
                                        ?></p>
                                    <p class="text-gray-300 font-bold text-[1.3vh] mt-4">Oluşturulma: <?= htmlspecialchars($categoryData['created_at']); ?></p>
                                </div>
                            </div>
                        </a>
                    <?php
                    endif;
                endforeach;

                if (!$hasChildCategory): ?>
                    <p class="text-center text-red-500">Alt kategori bulunmamaktadır.</p>
                <?php endif; ?>
            </div>
        </section>
    </div>

<?php
require View("static/footer");
?>