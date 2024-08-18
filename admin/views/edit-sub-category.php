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

                            <?php if (is_null($categoryData['parent_id'])): // Eğer bu kategori bir alt kategori değilse ?>
                                <div class="alert alert-warning">
                                    <strong>Bu bir Alt Kategori değil!</strong> Lütfen bu kategoriyi düzenlemek için aşağıdaki butona tıklayın.
                                </div>
                                <a href="/admin/edit-category/<?= $categoryData['id'] ?>" class="btn btn-warning mb-4">Düzenlemek için Tıklayın</a>
                            <?php else: ?>
                                <!-- Form Burada Gizli Tutulacak -->
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <!-- Başlık -->
                                    <div class="form-group">
                                        <label for="title">Başlık</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Başlık" value="<?= $categoryData['name'] ?>" required>
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
                                                                <option value="<?= $subcategory['id'] ?>" <?= $productData['category_id'] === $subcategory["id"] ?"selected" : ""?> class="mt-4">&nbsp; <?= $subcategory['name'] ?></option>
                                                            <?php }
                                                        }
                                                    } else { ?>
                                                        <option value="<?= $category['id'] ?>" <?= $productData['category_id'] === $category["id"] ?"selected" : ""?>><?= $category['name'] ?></option>
                                                    <?php }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <!-- Açıklama -->
                                    <input type="hidden" name="submit" value="1">
                                    <!-- Formu Gönder -->
                                    <button type="submit" name="submit" class="btn btn-primary mt-3">Güncelle</button>
                                </form>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php require admin_view("static/footer"); ?>
    </div>
</div>
