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
                    <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="<?= $bread['icon'] ?>"></i> <?= $bread['title'] ?></li>
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
                                    <label for="title">Portföy Başlığı</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Başlık" value="<?= $portfolioData['title'] ?>" required>
                                </div>

                                <!-- Açıklama -->
                                <div class="form-group">
                                    <label for="description">Açıklama</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Açıklama"><?= $portfolioData['description'] ?></textarea>
                                </div>

                                <!-- Mevcut Medya -->
                                <?php if ($portfolioData['image']): ?>
                                    <div class="form-group">
                                        <label>Mevcut Medya</label><br>

                                        <?php
                                        $file_extension = pathinfo($portfolioData['image'], PATHINFO_EXTENSION);

                                        $video_extensions = ['mp4', 'webm', 'ogg'];

                                        if (in_array(strtolower($file_extension), $video_extensions)): ?>
                                            <video src="<?=  $portfolioData['image'] ?>" controls="true" width="200"  style="border-radius: 0.50rem">
                                                Tarayıcınız video etiketini desteklemiyor.
                                            </video>
                                        <?php else: ?>
                                            <img src="<?= $portfolioData['image'] ?>" alt="Portföy Medyası"  width="200" style="border-radius: 0.50rem" ">
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>


                                <!-- Yeni Medya Yükle -->
                                <div class="form-group">
                                    <label for="image">Yeni Medya Yükle</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>

                                <input type="hidden" name="destination" value="<?= $portfolioData['image'] ?>">
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
