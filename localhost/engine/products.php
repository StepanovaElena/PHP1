<?php
//получение списка продуктов из базы данных
function getProducts () {
    $sql = "SELECT * FROM products";
    $products = getAssocResult($sql);
    return $products;
}
//получание данных о товаре по id
function getProductContent($id){
    $id = (int)$id;
    $sql = "SELECT * FROM products WHERE id = {$id}";
    $itemArr = getAssocResult($sql);

    //Проверка на пустое значение
    $item = [];
    if (isset($itemArr[0])) {$item = $itemArr[0];}

    return $item;
}
//добавление товара в корзину
function addItemToCart($id) {

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $item = getProductContent($id);
        if (!empty($item)) {
            $_SESSION['cart'][$item['id']] = [
                "quantity" => 1,
                "price" => $item['price']
            ];
        } else {
            $message = "This product id is invalid!";
        }
    }
}
//построение корзины
function buildCart() {

    if (!empty($_SESSION['cart'])) {

        $sql = "SELECT * FROM products WHERE id IN (";

        foreach ($_SESSION['cart'] as $id => $value) {
            $sql .= $id . ",";
        }

        $sql = substr($sql, 0, -1) . ")";

        $products = getAssocResult($sql);

        $subproducts = [];

        foreach ($products as $item) {
            $subitem = $item;
            $subitem += ['subtotal' => $_SESSION['cart'][$item['id']]['quantity'] * $item['price']];
            $subitem += ['quantity' => $_SESSION['cart'][$item['id']]['quantity']];
            $subproducts[] = $subitem;
        }
        return $subproducts;
    }
}
//удаление отдельного товара из корзины
function delItemFromCart($id){
    $id = (int)$id;
    unset($_SESSION['cart'][$id]);
}
//очистка корзины
function clearCart(){
    unset($_SESSION['cart']);
}
//добавление итогового заказа в базу данных заказов
function checkout ($number) {

    $orderNumb = rand(0, 10000);
    $orderPos = 0;

    $cart = buildCart();

    if (!empty($cart)) {

        foreach ($cart as $item) {

            $sql = "INSERT INTO cart (order_id, order_pos, session_id, product_id, quantity, price, sub_total, telephone) 
    VALUES ('" . $orderNumb . "', '" . ++$orderPos . "', '" . session_id() . "', '" . $item['id'] . "', '" . $item['quantity'] . "', '" . $item['price'] . "' , '" . $item['subtotal'] . "', '" . $number . "')";
            executeQuery($sql);
        }
    }

    clearCart();

    return $orderNumb;
}

