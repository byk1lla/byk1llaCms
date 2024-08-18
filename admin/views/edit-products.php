<?php
require admin_view("static/header");

?>

<div id="app">

    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3><?=$bread['title']?></h3>
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="<?=$bread['icon']?>"></i> <?=$bread['title']?></li>
                </ol>
            </nav>
        </div>

        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <!-- Başlık -->
                                <div class="form-group">
                                    <label for="title">Ürün İsmi</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Başlık" value="<?= $productData['name'] ?>" required>
                                </div>

                                <!-- Açıklama -->
                                <div class="form-group">
                                    <label for="description">Açıklama</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Açıklama"><?= $productData['description'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="price">Fiyat</label>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Ürün fiyatını girin"  value="<?= $productData['price'] ?>"required>
                                </div>

                                <div class="form-group">
                                    <label for="category">Kategori Seçin</label>
                                    <select class="form-control" id="category" name="category_id" required>
                                        <option value="">- Lütfen Bir Kategori Seçiniz -</option>
                                        <?php
                                        foreach ($categories as $category) {
                                            if (is_null($category['parent_id'])) {
                                                $has_subcategories = false;
                                                foreach ($categories as $subcategory) {
                                                    if ($subcategory['parent_id'] == $category['id']) {
                                                        $has_subcategories = true;
                                                        break;
                                                    }
                                                }

                                                if ($has_subcategories) { ?>
                                                    <option disabled><?= $category['name'] ?> (Ana Kategori)</option>
                                                    <?php
                                                    foreach ($categories as $subcategory) {
                                                        if ($subcategory['parent_id'] == $category['id']) { ?>
                                                            <option value="<?= $subcategory['id'] ?>" <?= $productData['category_id'] === $subcategory["id"] ?"selected" : ""?>  class="mt-4">&nbsp; <?= $subcategory['name'] ?></option>
                                                        <?php }
                                                    }
                                                } else { ?>
                                                    <option value="<?= $category['id'] ?>"> <?= $productData['category_id'] === $category["id"] ?"selected" : ""?>  <?= $category['name'] ?></option>
                                                <?php }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- Mevcut Resim -->
                                <?php if ($productData['image']): ?>
                                    <div class="form-group">
                                        <label>Mevcut Medya</label><br>

                                        <?php
                                        $file_extension = pathinfo($productData['image'], PATHINFO_EXTENSION);

                                        $video_extensions = ['mp4', 'webm', 'ogg'];

                                        if (in_array(strtolower($file_extension), $video_extensions)): ?>
                                            <video src="<?=  $productData['image'] ?>" controls="true" width="200">
                                                Tarayıcınız video etiketini desteklemiyor.
                                            </video>
                                        <?php else: ?>
                                            <img src="<?=$productData['image'] ?>" alt="Portföy Medyası" width="200">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>


                                <!-- Yeni Resim Yükle -->
                                <div class="form-group">
                                    <label for="image">Yeni Resim Yükle</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <input type="hidden" name="destination" value="<?=$productData['image']?>">
                                <input type="hidden" name="submit" value="1">
                                <!-- Formu Gönder -->
                                <button type="submit" name="submit" class="btn btn-primary mt-3">Güncelle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php
        require admin_view("static/footer");

        ?>
    </div>
</div>