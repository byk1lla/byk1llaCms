<?php
$id = route(2);
$meta =[
    'title' => 'Ürün Detayı'
];

$productData = $product->get($id);
$categoryData = [
    'id' => $productData["category_id"],
    'name' => $category->getCategoryName($productData["category_id"])
];
require View(route(1));