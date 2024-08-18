<?php

if (!route(2)) {
    $route[2] = "index";
}
if (!
file_exists(
    admin_controller(
        route(2)))) {
    $route[2] = "index";
}

$menus = [
    'index' => [
        'title' => "Dashboard",
        'icon' => "fas fa-tachometer-alt",
    ],

    'settings' => [
        'title' => "Ayarlar",

        'icon' => "bi bi-gear-wide-connected"
    ],
    'customers' => [
        'title' => "Müşteri Yönetimi",
        'icon' => "bi bi-person-fill-gear",
        'submenu' => [
            "add-comment" => "Yorum Ekle",
            "comments" => "Yorumları Yönet",
            "messages" => "Gelen Mesajlar"
        ]
    ],
    'categories' => [
        'title' => "Kategori Yönetimi",
        'icon' => "bi bi-tags",
        'submenu' => [
            'add-category' => 'Kategori Ekle',
            'add-sub-category' => 'Alt Kategori Ekle',
            'categories' => "Kategorileri Görüntüle"
        ]
    ],
    'produtcs' => [
        'title' => "Ürün Yönetimi",
        'icon' => "fa-solid fa-bag-shopping",
        'submenu' => [
            'add-product' => "Ürün Ekle",
            'products' => "Ürünleri Görüntüle"
        ]
    ],
    'users' => [
        'title' => "Kullanıcı Yönetimi",
        'icon' => "bi bi-people",

        'submenu' => [
            'add-user' => 'Kullanıcı Ekle',
            'users' => "Kullanıcıları Görüntüle"
        ]

    ],
    'portfolios' => [
        'title' => "Portföy Yönetimi",
        'icon' => "bi bi-briefcase",
        'submenu' => [
            'add-portfolio' => 'Portföy Ekle',
            'portfolios' => "Portföyleri Görüntüle"
        ]
    ],
    'services' => [
        'title' => "Hizmet Yönetimi",
        "icon" => "bi bi-box",
        'submenu' => [
            'add-service' => 'Hizmet Ekle',
            'services' => "Hizmetleri Görüntüle"
        ]
    ],

    'logout' => [
        'title' => "Oturumu Kapat",

        'icon' => "fa-solid fa-arrow-right-from-bracket text-danger"]


];

require admin_controller(route(2));