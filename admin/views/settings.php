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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Site Ayarları</h4>
                        <p class="text-sm text-danger ">Eğer <a href="#icerik" class="font-bold text-danger" >Sayfa içeriklerinin</a> plugini yüklenmezse CTRL+F5 at düzeliyo.</p>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Site Başlığı -->
                            <div class="form-group mb-3">
                                <label for="site_title">
                                    <i class="fas fa-heading"></i> Site Ve Navbar Başlığı (Title)
                                </label>
                                <input type="text" class="form-control" id="site_title" name="settings[title]" placeholder="Site başlığını girin" value="<?=setting("title")?>">
                            </div>

                            <!-- Favicon -->
                            <div class="form-group mb-3">
                                <label for="site_favicon">
                                    <i class="fas fa-icons"></i> Favicon
                                </label>


                                <?php if(setting("favicon")): ?>
                                    <img src="<?= URL . setting("favicon") ?>" alt="Favicon" width="32" height="32">
                                    <input type="hidden" name="settings[favicon]"  value="<?=setting("favicon")?>">
                                <?php  else:
                                ?>
                                    <input type="file" class="form-control" id="site_favicon" name="settings[favicon]" accept="image/*">
                                <?php
                                endif; ?>
                            </div>

                            <!-- Navbar İkonu -->
                            <div class="form-group mb-3">
                                <label for="site_nav_icon">
                                    <i class="fas fa-bars"></i> Navbar İkonu
                                </label>
                                <?php if(setting("nav_icon")): ?>
                                    <img src="<?= URL . setting("nav_icon") ?>" alt="nav_icon" width="32" height="32">
                                    <input type="hidden" name="settings[nav_icon]"  value="<?=setting("nav_icon")?>">
                                <?php  else:
                                    ?>
                                    <input type="file" class="form-control" id="site_favicon" name="settings[nav_icon]" accept="image/*">
                                <?php
                                endif; ?>
                            </div>

                            <!-- Site Açıklaması -->
                            <div class="form-group mb-3">
                                <label for="site_description">
                                    <i class="fas fa-quote-left"></i> Site Açıklaması (Description)
                                </label>
                                <input type="text" class="form-control" id="site_description" name="settings[description]" placeholder="Site açıklamasını girin" value="<?=setting("description")?>">
                            </div>

                            <!-- Anahtar Kelimeler -->
                            <div class="form-group mb-3">
                                <label for="site_keywords">
                                    <i class="fas fa-key"></i> Anahtar Kelimeler (Keywords)
                                </label>
                                <input type="text" class="form-control" id="site_keywords" name="settings[keywords]" placeholder="Anahtar kelimeleri girin" value="<?=setting("keywords")?>">
                            </div>

                            <div class="form-group mb-3">
                                <label for="site_description">
                                    <i class="fas fa-quote-left"></i> Hero Card(Büyük Siyah Kart) Başlığı
                                </label>
                                <input type="text" class="form-control" id="site_description" name="settings[hero_title]" placeholder="Hero Card başlığını girin" value="<?=setting("hero_title")?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="site_description">
                                    <i class="fas fa-quote-left"></i> Hero Card(Büyük Siyah Kart) Açıklaması
                                </label>
                                <input type="text" class="form-control" id="site_description" name="settings[hero_description]" placeholder="Hero Card açıklamasını girin" value="<?=setting("hero_description")?>">
                            </div>

                            <!-- Site Teması -->
                            <div class="form-group mb-3">
                                <label for="site_theme">
                                    <i class="fas fa-paint-brush"></i> Site Teması
                                </label>
                                <select class="form-control" name="settings[theme]" id="site_theme">
                                    <option>- Lütfen Bir Tema Seçiniz -</option>
                                    <?php foreach($themes as $theme): ?>
                                        <option <?= setting("theme") == $theme['name'] ? 'selected' : null ?>
                                                value="<?= $theme['name'] ?>" <?= $theme['disabled'] ? 'disabled' : '' ?>>
                                            <?= $theme['name'] . ($theme['disabled'] ? ' (Devre Dışı)' : '') ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h4>Kategoriler & Ürünler Sayfa Ayarları</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="bakim_title">
                                            <i class="fas fa-heading"></i> Kategoriler Başlığı
                                        </label>
                                        <input type="text" class="form-control" id="bakim_title" name="settings[categories_title]" placeholder="Kategoriler başlığını girin" value="<?=setting("categories_title")?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="bakim_description">
                                            <i class="fas fa-info-circle"></i> Kategoriler Açıklaması
                                        </label>
                                        <textarea class="form-control" id="bakim_description" name="settings[categories_description]" placeholder="Kategoriler açıklamasını girin"><?=setting("categories_description")?></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="bakim_title">
                                            <i class="fas fa-heading"></i> Ürünler Başlığı
                                        </label>
                                        <input type="text" class="form-control" id="bakim_title" name="settings[products_title]" placeholder="Ürünler başlığını girin" value="<?=setting("products_title")?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="bakim_description">
                                            <i class="fas fa-info-circle"></i> Ürünleru Açıklaması
                                        </label>
                                        <textarea class="form-control" id="bakim_description" name="settings[product_description]" placeholder="Ürünler açıklamasını girin"><?=setting("product_description")?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Bakım Modu -->
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h4>Bakım Modu</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="bakim_modu">
                                            <i class="fas fa-tools"></i> Bakım Modu
                                        </label>
                                        <select class="form-control" name="settings[bakim]" id="bakim_modu">
                                            <option <?=setting("bakim") == 1 ? "selected" : null?> value="1">Açık</option>
                                            <option <?=setting("bakim") == 0 ? "selected" : null?> value="0">Kapalı</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="bakim_title">
                                            <i class="fas fa-heading"></i> Bakım Modu Başlığı
                                        </label>
                                        <input type="text" class="form-control" id="bakim_title" name="settings[bakim_title]" placeholder="Bakım modu başlığını girin" value="<?=setting("bakim_title")?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="bakim_description">
                                            <i class="fas fa-info-circle"></i> Bakım Modu Açıklaması
                                        </label>
                                        <textarea class="form-control" id="bakim_description" name="settings[bakim_description]" placeholder="Bakım modu açıklamasını girin"><?=setting("bakim_description")?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Terms, Privacy Policy, About Us -->
                            <div class="card mt-4" id="icerik">
                                <div class="card-header">
                                    <h4>Sayfa İçerikleri</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="terms">
                                            <i class="fas fa-file-alt"></i> Kullanım Koşulları
                                        </label>
                                        <textarea class="form-control"  id="other-pages" cols="30" rows="10" name="settings[terms]" placeholder="Kullanım Koşulları içeriğini girin"><?=setting("terms")?></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="privacy_policy">
                                            <i class="fas fa-shield-alt"></i> Gizlilik Sözleşmesi
                                        </label>
                                        <textarea class="form-control" id="other-pages"  cols="30" rows="10" name="settings[privacy-policy]" placeholder="Gizlilik Sözleşmesi içeriğini girin"><?=setting("privacy-policy")?></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="about_us">
                                            <i class="fas fa-users"></i> Hakkımızda
                                        </label>
                                        <textarea class="form-control" id="other-pages" cols="30" rows="10" name="settings[about-us]" placeholder="Hakkımızda içeriğini girin"><?=setting("about-us")?></textarea>
                                    </div>
                                </div>
                            </div>



                            <input type="hidden" name="submit" value="1">
                            <button type="submit" class="btn btn-primary mt-4">
                                <i class="fas fa-save"></i> Kaydet
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php
    require admin_view("static/footer");
    ?>
