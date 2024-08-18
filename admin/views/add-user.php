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
                <div class="col-md-6 col-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Yeni Kullanıcı Bilgileri</h4>
                        </div>
                        <div class="card-body">
                            <form action="/admin/add-user" method="POST">
                                <div class="form-group mb-3">
                                    <label for="username">Kullanıcı Adı</label>
                                    <input type="text" id="username" name="username" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">E-posta</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Şifre</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                                <input type="hidden" name="submit" value="1">
                                <button type="submit" class="btn btn-primary">Kullanıcı Ekle</button>
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
