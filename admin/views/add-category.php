<?php
require admin_view("static/header");

?>

<div id="app">
    <?php
    require admin_view("static/sidebar");
    ?>

    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Kategori Ekle</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST">
                                <!-- Kategori Adı -->
                                <div class="form-group">
                                    <label for="category_name">Kategori Adı</label>
                                    <input type="text" class="form-control" id="category_name" name="name" placeholder="Kategori adını girin" required>
                                </div>

                                <!-- Formu Gönder -->
                                <input type="hidden" name="submit" value="1">
                                <button type="submit" name="submit" class="btn btn-primary mt-3">Kategori Ekle</button>
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
