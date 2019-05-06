<?php
//добавление итогового заказа в базу данных заказов
function checkout ($number) {

    $orderNumb = rand(0, 10000);
    $orderPos = 0;
    $date = date("Y-m-d");

    $cart = buildCart();

    if (!empty($cart)) {
        if (isset($_SESSION['auth']['login']) && isset($_SESSION['auth']['id'])){
            $login = $_SESSION['auth']['login'];
            $id = $_SESSION['auth']['id'];
            $sql = "INSERT INTO orders (order_number, date, session_id, user_login, user_id, status, telephone, delivery)
                VALUES ('{$orderNumb}', '{$date}', '" . session_id() . "', '{$login}', '{$id}', 'new', '{$number}')";
        } else {
            $sql = "INSERT INTO orders (order_number, date, session_id, user_login, user_id, status, telephone, delivery)
                VALUES ('{$orderNumb}', '{$date}', '" . session_id() . "', '{$login}', 'guest', 'new', '{$number}')";
        }
        executeQuery($sql);

        foreach ($cart as $item) {
            $sql = "INSERT INTO orders_positions (order_id, order_pos, product_id, quantity, subtotal,  color, size, discount) 
            VALUES ('{$orderNumb}', '" . ++$orderPos . "', '{$item['id']}', '{$item['quantity']}', '{$item['subtotal']}', '', '', item['discount'])";
            executeQuery($sql);
        }
    }

    clearCart();

    return $orderNumb;
}

/*Вывод заказов для админа*/
function displayOrders() {
    $sql = "SELECT * FROM orders WHERE status = 'new'";
    $ord = getAssocResult($sql);

    if(!empty($ord)) {
        foreach ($ord as $item) {
            $sql = "SELECT sum(subtotal) as total FROM orders_positions WHERE order_id = {$item['order_number']} GROUP BY order_id";
            $total = getAssocResult($sql);
            $subitem = $item;
            $subitem += ['total' => $total[0]['total']];
            $orders[]= $subitem;
        }
        return $orders;
    }else{
        return $orders = 'There are no new orders.';
    }
}

/*Вывод информации о заказе для админа*/
function displayOrderInfo($id) {
    $sql = "SELECT * FROM products INNER JOIN orders_positions ON products.id = orders_positions.product_id WHERE orders_positions.order_id ='{$id}'";
    $ord = getAssocResult($sql);

    if(!empty($ord))
        return $ord;
}
/*Подтверждение заказа для админа*/
function confirmOrder($id) {
    $sql = "UPDATE orders SET status = 'confirmed' WHERE order_number={$id}";
    executeQuery($sql);
}

/*Отклонение заказа для админа*/
function declineOrder($id) {
    $sql = "UPDATE orders SET status = 'decline' WHERE order_number={$id}";
    executeQuery($sql);
}

/*Вывод заказов для админа*/
function displayOrderById($id) {
    $sql = "SELECT * FROM orders WHERE order_number = '{$id}'";
    $ord = getAssocResult($sql);

    $result = [];
    if (isset($ord[0])) $result = $ord[0];

    $order_id = $result['order_number'];
    $total = getOrderTotalSum($order_id);
    $result += ['total' => $total[0]['total']];

    return $result;
}
//Изменение данных в заказе
function changeOrderInfo($id,$dlv,$tel) {
    $sql = "UPDATE orders SET delivery = '{$dlv}', telephone = '{$tel}' WHERE order_number={$id}";
    executeQuery($sql);
}

/*Вывод заказов для пользователя*/
function displayUserOrders() {

    if (isset($_SESSION['auth']['login']) && isset($_SESSION['auth']['id'])) {
        $id = $_SESSION['auth']['id'];
        $sql = "SELECT * FROM orders WHERE user_id = '{$id}'";
        $ord = getAssocResult($sql);

        if (!empty($ord)) {
            foreach ($ord as $item) {
                $order_id = $item['order_number'];
                $total = getOrderTotalSum($order_id);
                $subitem = $item;
                $subitem += ['total' => $total[0]['total']];

                $pos = getOrderPositions ($order_id);
                $subitem += ['positions' => $pos];

                $detail =
                $orders[] = $subitem;
            }
            return $orders;
        } else {
            return $orders = 'There are no orders yet.';
        }
    }
}

//Получение итоговой суммы заказа
function getOrderTotalSum ($id) {
    $sql = "SELECT sum(subtotal) as total FROM orders_positions WHERE order_id = '{$id}' GROUP BY order_id";
    $total = getAssocResult($sql);
    return $total;
}
//Получение данных о позиции заказа по номеру заказа
function getOrderPositions ($id) {
    $sql ="SELECT * FROM orders_positions INNER JOIN products ON products.id = orders_positions.product_id WHERE orders_positions.order_id ='{$id}'";
    $pos = getAssocResult($sql);
    return $pos;
}
