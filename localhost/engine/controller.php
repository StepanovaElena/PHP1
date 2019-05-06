<?php

function prepareVariables($page, $action, $id){
    $params = [];
    $params['is_ajax'] = false;
    $params['allow'] = sessionUser();
    $params['ngoods'] = getBasketCount();

    switch ($page) {
        case 'index':
            break;

        case 'products':

            $params['products'] = getAllProducts();

            break;

        case 'single_page':

            $error_prod = ' ';
            if (isset($_GET['error'])) {
              if ($_GET['error'] == 11) $error_prod = 'Fields are filled incorrectly :(';
              if ($_GET['error'] == 12) $error_prod = 'Feedback sent successfully :)';
            }

            $params['params'] = getProductContent($id);
            $params['itemID'] = $id;

            if ($action == "like") {
                $idFB = (int)$id;
                addLikes($idFB);
                $id = (int)$_GET['backid'];

               header("Location: /single_page/{$id}/");
            }

            $params['fb'] = displayComments($id);

            $params['error'] = $error_prod;

            if ($_POST['submit']) {
               $error = addComments($id);
                header("Location: /single_page/{$id}/?&error={$error}");
            }
            break;

        case 'cart':

            if (isset($_GET['order'])) {
                $order = $_GET['order'];
                $params['msg'] = "The order number {$order} is successfully issued.";
            }

            $params['params'] = buildCart();

            $params['total'] = getBasketSum();

            if ($action == "item_delete") {
                $id = (int)$id;
                delItemFromCart($id);
                header("Location: /cart/");
            }

            if ($action == "clear") {
                clearCart();

                header("Location: /cart/");
            }

            if ($action == "checkout") {
                $number = $_POST['telephone'];
                $order = checkout ($number);

                header("Location: /cart/?order={$order}");
            }
        break;

        case 'account':

            $params['orders'] = displayUserOrders();

            break;

        case 'feedbacks_admin':

            $params['feedback'] = doFeedbackAction($action, $id);

            break;

        case 'orders_admin':

            $params['orders'] = displayOrders();

            if ($action == "order_confirm") {
                $id = (int)$id;
                confirmOrder($id);
                header("Location: /orders_admin/");
            }

            if ($action == "order_decline") {
                $id = (int)$id;
                declineOrder($id);
                header("Location: /orders_admin/");
            }
            break;

        case 'order_info':

            $params['positions'] = displayOrderInfo($id);

            $params ['order'] = displayOrderById($id);

            break;

        case 'addItemToCart':

            $params['is_ajax'] = true;
            $id = (int)$_POST['id'];
            addItemToCart($id);
            $params ['ngoods'] = getBasketCount();

            break;

        case 'changeItemQnt':

            $params['is_ajax'] = true;
            $id = (int)$_POST['id'];
            $qnt = (int)$_POST['quantity'];
            $params['subtotal'] = changeItemQnt($id, $qnt);
            $params ['id'] = $id;
            $params ['qnt'] = $qnt;
            $params ['ngoods'] = $qnt;
            $params ['total'] = getBasketSum();

            break;

        case 'offers':
            $params['category'] = getAllCategories();

            break;

        case 'changeOffer':

            $params['is_ajax'] = true;
            $id = (int)$_POST['id'];
            $qnt = (int)$_POST['discount'];
            changeOffers($id, $qnt);
            $params ['id'] = $id;
            $params ['discount'] = $qnt;

            break;

        case 'changeOrder':

            $params['is_ajax'] = true;
            $id = $_POST['id'];
            $tel = $_POST['tel'];
            $dlv = $_POST['dlv'];
            changeOrderInfo($id, $dlv, $tel);

            $params ['tel'] = $tel;
            $params ['dlv'] = $dlv;

            break;
    }
    return $params;
}





