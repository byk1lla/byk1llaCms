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
            <h3><?= $bread['title'] ?></h3>
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><i
                                class="<?= $bread['icon'] ?>"></i> <?= $bread['title'] ?></li>
                </ol>
            </nav>
        </div>

        <div class="page-content">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Mevcut Ürünler</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table1" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Başlık</th>
                                        <th>Açıklama</th>
                                        <th>Kategorisi</th>
                                        <th>Fiyatı</th>
                                        <th>Resim Yolu</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($products as $product): ?>
                                        <tr>
                                            <td><?= $product['id']; ?></td>
                                            <td><?= $product['title']; ?></td>
                                            <td><?= $product['description']; ?></td>
                                            <td><?= $category->getCategoryName($product['category_id']); ?></td>
                                            <td><?= $product['price']; ?></td>
                                            <td>
                                                <a class="btn btn-primary" target="_blank"
                                                   href="<?= $product['image']; ?>">Resme Gitmek için tıkla</a>
                                            </td>
                                            <td><?= date("d/m/Y H:i:s", strtotime($product['created_at'])); ?></td>

                                            <td>
                                                <a href="/admin/edit-products/<?= $product['id']; ?>"
                                                   class="btn btn-sm btn-warning">Düzenle</a>
                                                <a href="javascript:void(0)"
                                                   onclick="handleDelete('<?= $product["name"] ?>','Ürün','<?= $product['id'] ?>','<?= rtrim(route(2), 's') ?>');"
                                                   class="btn btn-danger"> Sil</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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
