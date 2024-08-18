<?php
require './app/init.php'; // Veritabanı bağlantısını alıyoruz.

header("Content-Type: application/xml; charset=UTF-8");
ob_start();

// URL'leri toplamak için diziyi başlatıyoruz
$urls = [];

$urls[] = [
    'loc' => 'https://3etasimacilik.com',
    'priority' => '1.0',
    'changefreq' => 'daily',
];

$urls[] = [
    'loc' => 'https://3etasimacilik.com/about-us',
    'priority' => '1.0',
    'changefreq' => 'daily',
];
$urls[] = [
    'loc' => 'https://3etasimacilik.com/contact',
    'priority' => '1.0',
    'changefreq' => 'daily',
];
$urls[] = [
    'loc' => 'https://3etasimacilik.com/category',
    'priority' => '1.0',
    'changefreq' => 'daily',
];$urls[] = [
    'loc' => 'https://3etasimacilik.com/products',
    'priority' => '1.0',
    'changefreq' => 'daily',
];
// Kategorilerden URL'leri almak (ID'leri kullanarak)
$categories = $db->query("SELECT id, updated_at FROM categories")->fetchAll(PDO::FETCH_ASSOC);
foreach ($categories as $category) {
    $urls[] = [
        'loc' => 'https://3etasimacilik.com/category/' . $category['id'], // ID ile URL oluşturuyoruz
        'priority' => '0.8',
        'changefreq' => 'weekly',
        'lastmod' => date(DATE_W3C, strtotime($category['updated_at'])),
    ];
}

// Ürünlerden URL'leri almak (ID'leri kullanarak)
$products = $db->query("SELECT id, updated_at FROM products")->fetchAll(PDO::FETCH_ASSOC);
foreach ($products as $product) {
    $urls[] = [
        'loc' => 'https://3etasimacilik.com/product-detail/' . $product['id'], // ID ile URL oluşturuyoruz
        'priority' => '0.7',
        'changefreq' => 'weekly',
        'lastmod' => date(DATE_W3C, strtotime($product['updated_at'])),
    ];
}

// Pörtföylerden URL'leri almak (ID'leri kullanarak)
$products = $db->query("SELECT id, updated_at FROM portfolios")->fetchAll(PDO::FETCH_ASSOC);
foreach ($products as $product) {
    $urls[] = [
        'loc' => 'https://3etasimacilik.com/portfolio/' . $product['id'], // ID ile URL oluşturuyoruz
        'priority' => '0.7',
        'changefreq' => 'weekly',
        'lastmod' => date(DATE_W3C, strtotime($product['updated_at'])),
    ];
}

// XML çıktısını oluşturma
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">';
foreach ($urls as $url) {
    echo '<url>';
    echo '<loc>' . htmlspecialchars($url['loc']) . '</loc>';
    if (isset($url['lastmod'])) {
        echo '<lastmod>' . $url['lastmod'] . '</lastmod>';
    }
    echo '<changefreq>' . $url['changefreq'] . '</changefreq>';
    echo '<priority>' . $url['priority'] . '</priority>';
    echo '</url>';
}
echo '</urlset>';
ob_end_flush();
