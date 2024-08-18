<?php
require admin_view("static/header");

?>

<div id="app">
    <!--    sidebar-->

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
                                <!-- Kullanıcı Adı -->
                                <div class="form-group">
                                    <label for="username">Müşteri adı</label>
                                    <input type="text" class="form-control" id="username" name="title" placeholder="Hizmetinizin Başlığını Girin" required>
                                </div>

                                <!-- Açıklama -->
                                <div class="form-group">
                                    <label for="description">Müşteri Yorumu</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Hizmetinizin açıklamasını girin" required></textarea>
                                </div>


                                <!-- Formu Gönder -->
                                <input type="hidden" name="submit" value="1">
                                <button type="submit" name="submit" class="btn btn-primary mt-3">Müşteri Yorumu Ekle</button>
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