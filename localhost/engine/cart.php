<?php
//добавление товара в корзину
function addItemToCart($id) {

    if (isset($_SESSION['cart'][$id])) {
        var_dump($_SESSION['cart'][$id]);
        $qnt = ++$_SESSION['cart'][$id]['quantity'];
        changeItemQnt($id, $qnt);

    } else {
        $item = getProductContent($id);
        if (!empty($item)) {
            //добавление в сессию
            $_SESSION['cart'][$item['id']] = [
                "quantity" => 1,
                "price" => $item['price'],
                "discount" => $item['discount'],
                "discount-price" => $item['discount-price']
            ];

            if ($item['discount'] !=0) {
                $_SESSION['cart'][$item['id']] += [
                   "subtotal" => $item['discount-price']
                ];
            } else {
                $_SESSION['cart'][$item['id']] += [
                    "subtotal" => $item['price']
              ];
            }
            var_dump($_SESSION['cart'][$item['id']]);
            //добавление в базу данных
            //Для авторизированного пользователя
            if (isset($_SESSION['auth']['login']) && isset($_SESSION['auth']['id'])){
                $sql = "INSERT INTO order_tmp (product_id, quantity, subtotal, session_id, user_id) 
            VALUES ('{$item['id']}', '{$_SESSION['cart'][$item['id']]['quantity']}', '{$_SESSION['cart'][$item['id']]['subtotal']}', '" . session_id(). "', '{$_SESSION['auth']['id']}')";
            } else {
                //Для гостя
                $sql = "INSERT INTO order_tmp (product_id, quantity, subtotal, session_id, user_id) 
            VALUES ('{$item['id']}', '{$_SESSION['cart'][$item['id']]['quantity']}', '{$_SESSION['cart'][$item['id']]['subtotal']}', '" . session_id(). "', '')";
            }
            executeQuery($sql);
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
            $subitem += ['subtotal' => $_SESSION['cart'][$item['id']]['subtotal']];
            $subitem += ['quantity' => $_SESSION['cart'][$item['id']]['quantity']];
            $subproducts[] = $subitem;
        }
        return $subproducts;
    }
}

//удаление отдельного товара из корзины
function delItemFromCart($id){
    $id = (int)$id;
    $session = session_id();
    $sql = "DELETE FROM `order_tmp` WHERE (`product_id` = '{$id}' AND `session_id` = '{$session}')";
    executeQuery($sql);
    unset($_SESSION['cart'][$id]);
}

//очистка корзины
function clearCart(){
    $session = session_id();
    $sql = "DELETE FROM `order_tmp` WHERE `session_id` = '{$session}'";
    executeQuery($sql);
    unset($_SESSION['cart']);
}
//подсчет общего количества товаров в корзине
function getBasketCount() {
    $db = getDb();
    $session_id = mysqli_real_escape_string($db, strip_tags(stripslashes(session_id())));
    $sql = "SELECT sum(quantity) as count FROM `order_tmp` WHERE `session_id`='{$session_id}'";
    $count = getAssocResult($sql);

    $result = [];
    if (isset($count[0]))
        $result = $count[0];

    return $result['count'];
}

//подсчет суммы товаров в корзине
function getBasketSum() {
    $session_id = session_id();
    $sql = "SELECT sum(subtotal) as total FROM `order_tmp` WHERE `session_id`='{$session_id}'";
    $sum = getAssocResult($sql);

    $result = [];
    if (isset($sum[0]))
        $result = $sum[0];

    return $result['total'];
}

//подсчет изменение кол-ва товаров в корзине
function changeItemQnt($id, $qnt) {

    $_SESSION['cart'][$id]['quantity'] = $qnt;

    if ($_SESSION['cart'][$id]['discount'] != 0) {
        $subtotal = $_SESSION['cart'][$id]['discount-price'] * $qnt;
        $_SESSION['cart'][$id]['subtotal'] = $subtotal;
    } else {
        $subtotal = $_SESSION['cart'][$id]['price'] * $qnt;
        $_SESSION['cart'][$id]['subtotal'] = $subtotal;
    }
    //обновляем данные в базе
    $session_id = session_id();
    $sql = "UPDATE `order_tmp` SET `quantity` = '{$qnt}',`subtotal` = '{$subtotal}' WHERE (`product_id` = '{$id}' AND `session_id` = '{$session_id}')";
    executeQuery($sql);
    return $subtotal;
}