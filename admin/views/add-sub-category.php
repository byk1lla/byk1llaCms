<?php
require admin_view("static/header");

?>

<div id="app">
    <?php
    require admin_view("static/sidebar");
    ?>

    <div id="main">
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
                            <form action="" method="POST">
                                <!-- Alt Kategori Adı -->
                                <div class="form-group">
                                    <label for="subcategory_name">Alt Kategori Adı</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Alt kategori adını girin" required>
                                </div>

                                <!-- Kategori Seçimi -->
                                <div class="form-group">
                                    <label for="category_id">Ana Kategori Seçin</label>
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        <option value="">- Lütfen Bir Kategori Seçiniz -</option>
                                        <?php
                                        foreach ($categories as $category) {
                                            // Ana kategori olup olmadığını kontrol et (parent_id null ise)
                                            if (is_null($category['parent_id'])) {
                                                // Ana kategoriyi seçilebilir yap
                                                ?>
                                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?> (Ana Kategori)</option>
                                                <?php
                                                // Alt kategorileri kontrol et
                                                foreach ($categories as $subcategory) {
                                                    if ($subcategory['parent_id'] == $category['id']) { ?>
                                                        <option value="<?= $subcategory['id'] ?>"> &nbsp;&nbsp;&nbsp;→ <?= $subcategory['name'] ?></option>
                                                    <?php }
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- Formu Gönder -->
                                <input type="hidden" name="submit" value="1">
                                <button type="submit" name="submit" class="btn btn-primary mt-3">Alt Kategori Ekle</button>
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
