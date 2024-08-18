<?php
$id = route(2);

$categories = $category->getAll();
if($id){
    $categoryName = ucfirst($category->getCategoryName($id));
    $countProducts = $product->countByCategory($id);
    $meta =[
        'title' => "$categoryName Kategorisi"
    ];
    $products = $product->filterByCategory($id);
    require View("category-products");
}else{

    $meta =[
        'title' => 'Kategoriler'
    ];

    require View("category");
}

