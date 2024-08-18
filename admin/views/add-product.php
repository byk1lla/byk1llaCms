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
                                <!-- Ürün Başlığı -->
                                <div class="form-group">
                                    <label for="title">Ürün Başlığı</label>
                                    <input type="text" class="form-control" id="title" name="name" placeholder="Ürünün Başlığını Girin" required>
                                </div>

                                <!-- Açıklama -->
                                <div class="form-group">
                                    <label for="description">Açıklama</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Ürün açıklamasını girin" required></textarea>
                                </div>

                                <!-- Fiyat -->
                                <div class="form-group">
                                    <label for="price">Fiyat</label>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Ürün fiyatını girin" required>
                                </div>

                                <!-- Kategori Seçimi -->
                                <div class="form-group">
                                    <label for="category">Kategori Seçin</label>
                                    <select class="form-control" id="category" name="category_id" required>
                                        <option value="">- Lütfen Bir Kategori Seçiniz -</option>
                                        <?php
                                        foreach ($categories as $category) {
                                            // Ana kategori olup olmadığını kontrol et (parent_id null ise)
                                            if (is_null($category['parent_id'])) {
                                                // Alt kategorileri kontrol et
                                                $has_subcategories = false;
                                                foreach ($categories as $subcategory) {
                                                    if ($subcategory['parent_id'] == $category['id']) {
                                                        $has_subcategories = true;
                                                        break;
                                                    }
                                                }

                                                // Eğer alt kategoriler varsa, ana kategoriyi disabled yap ve alt kategorileri göster
                                                if ($has_subcategories) { ?>
                                                    <option disabled><?= $category['name'] ?> (Ana Kategori)</option>
                                                    <?php
                                                    foreach ($categories as $subcategory) {
                                                        if ($subcategory['parent_id'] == $category['id']) { ?>
                                                            <option value="<?= $subcategory['id'] ?>"> &nbsp;&nbsp;&nbsp;→ <?= $subcategory['name'] ?></option>
                                                        <?php }
                                                    }
                                                } else { ?>
                                                    <!-- Eğer alt kategorisi yoksa normal kategori olarak göster -->
                                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                                <?php }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Resim -->
                                <div class="form-group">
                                    <label for="image">Resim Yükle</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>

                                <!-- Formu Gönder -->
                                <input type="hidden" name="submit" value="1">
                                <button type="submit" name="submit" class="btn btn-primary mt-3">Ürün Ekle</button>
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
