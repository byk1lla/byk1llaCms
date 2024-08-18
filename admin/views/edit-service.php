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
                                    <label for="title">Başlık</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Başlık" value="<?= $serviceData['title'] ?>" required>
                                </div>

                                <!-- Açıklama -->
                                <div class="form-group">
                                    <label for="description">Açıklama</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Açıklama"><?= $serviceData['description'] ?></textarea>
                                </div>
                                <input type="hidden" name="submit" value="1">
                                <!-- Formu Gönder -->
                                <button type="submit" name="submit" class="btn btn-primary mt-3">Güncelle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
<?php        require admin_view("static/footer");
?>
    </div>
</div>