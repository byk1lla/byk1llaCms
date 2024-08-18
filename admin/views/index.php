<?php
require admin_view("static/header");
?>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3 class="mb-4">Hoşgeldiniz <?=$_SESSION["username"]?></h3>
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            </ol>
        </nav>
    </div>

    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row g-4">
                    <!-- Kullanıcı Kartı -->
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="card h-100 shadow-sm p-3">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar avatar-lg me-3">
                                    <img src="<?=admin_pub("/images/" . $_SESSION["username"]. ".jpg")?>"
                                         alt="User Avatar"
                                         class="rounded-circle"
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                </div>
                                <div class="user-info">
                                    <h5 class="font-bold mb-1"><?=$_SESSION["username"]?></h5>
                                    <h6 class="text-muted mb-0" style="font-size: 14px;">
                                        <?=$_SESSION['username'] == "byk1lla" ? "Kullanıcı Rolleri: Admin, Sistem Yöneticisi, Kadın Menajeri":"Patron, Büyük adam, canım babam <3"?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Site Bilgileri Kartı -->
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="card h-100 shadow-sm p-3">
                            <div class="card-body">
                                <h5 class="font-bold">Site Bilgileri</h5>
                                <ul class="list-unstyled mt-3 mb-0">
                                    <li><strong>Toplam Kullanıcılar:</strong> <?=$user->count()?></li>
                                    <li><strong>Toplam Kategoriler:</strong> <?=$category->count()?></li>
                                    <li><strong>Toplam Projeler:</strong> <?=$portfolio->count()?></li>
                                    <li><strong>Gelen Mesajlar:</strong> <?=$customer->countMessages()?></li>
                                    <li><strong>Toplam Kullanıcı Yorumu:</strong> <?=$customer->count()?></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kullanılan Teknolojiler -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Kullanılan Teknolojiler</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    Bu yönetim paneli <strong>PHP</strong>, <strong>MySQL</strong>, <strong>TailwindCss</strong> ve
                                    <strong>BootstrapCss</strong> teknolojileri kullanılarak geliştirilmiştir. Ayrıca, kullanıcı arayüzü ve veri yönetimi için
                                    <strong>JavaScript</strong> kütüphaneleri ve <strong>AJAX</strong> ile dinamik içerik yönetimi sağlanmıştır.
                                </p>
                                <p>Panelde aşağıdaki işlemler yapılabilir:</p>
                                <ul>
                                    <li>Kullanıcı ekleme, görüntüleme ve silme</li>
                                    <li>Kategori ve Alt Kategori yönetimi</li>
                                    <li>Hizmet ekleme ve görüntüleme</li>
                                    <li>Müşteri yorumları ve mesaj yönetimi</li>
                                    <li>Site ayarlarını değiştirme</li>
                                    <li>Bakım modu yönetimi</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php
    require admin_view("static/footer");
    ?>
