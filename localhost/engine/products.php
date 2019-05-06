<?php
//получение списка продуктов из базы данных
function getProducts () {
    $sql = "SELECT * FROM category INNER JOIN products ON products.category_id = category.id;";
    $products = getAssocResult($sql);
    return $products;
}

function getAllProducts () {
    $products = getProducts();
    foreach ($products as $item) {
        $subitem = $item;
        if ($item['discount'] != 0) {
            $newPrice = $item['price'] * (1 - ($item['discount']/100));
            $subitem += ['discount-price' => $newPrice];
        }
        $subproducts[] = $subitem;
    }
    return $subproducts;
}
//получание данных о товаре по id
function getProductContent($id){
    $id = (int)$id;
    $sql = "SELECT category.*, products.*  FROM category, products  WHERE (products.id = {$id} AND products.category_id = category.id)";
    $itemArr = getAssocResult($sql);
    //Проверка на пустое значение
    $item = [];
    if (isset($itemArr[0])) {$item = $itemArr[0];}
    //Проверка на наличие скидки
    if ($item['discount'] != 0) {
        $newPrice = $item['price'] * (1 - ($item['discount']/100));
        $item += ['discount-price' => $newPrice];
    }

    return $item;
}

//Изменение скидки админом
function changeOffers($id, $qnt){
    $id = (int)$id;
    $sql = "UPDATE `category` SET `discount` = '{$qnt}' WHERE id = {$id}";
    executeQuery($sql);
}

function getAllCategories(){
    $sql = "SELECT * FROM category";
    $item = getAssocResult($sql);
    return $item;
}