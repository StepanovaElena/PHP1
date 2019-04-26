<?php

function prepareVariables($page, $action, $id){
    $params = [];
    $params['is_ajax'] = false;
    $params['allow'] = sessionUser();

    switch ($page) {
        case 'index':
            break;

        case 'products':
            $params['products'] = getProducts();
            break;

        case 'single_page':

            $error_prod = ' ';
            if (isset($_GET['error'])) {
              if ($_GET['error'] == 11) $error_prod = 'Fields are filled incorrectly :(';
              if ($_GET['error'] == 12) $error_prod = 'Feedback sent successfully :)';
            }

            $params['params'] = getProductContent($id);
            $params['itemID'] = $id;

            if ($action == "add") {
                $id = (int)$id;
                addItemToCart($id);

               header("Location: /single_page/{$id}/?status=ok");
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
/*
        case "image":
            //получаем индекс изображения

            if ($action != 'edit') {
                $id = (int)$id;
                $params = doFeedbackActionImage($action, $id);
            } else {

                $params = doFeedbackActionImage($action, $id);
                $params['edit_id'] = $id;
                $id = (int)$_GET['backid'];
            }
            //добавим лайки изображению с полученным индексом
            add_likes($id);
            //подготовим переменные для шаблона
            $image = getOneImage($id);

            $params['image'] = $image['filename'];
            $params['likes'] = $image['likes'];
            $params['id'] = $image['idx'];
            break;

        case "addlike":
            $id = (int)$_POST['id'];
            add_likes($id);
            $image = getOneImage($id);
            $params['likes'] = $image['likes'];
            $params['is_ajax'] = true;
            break;

        case "feedback":
           $params = doFeedbackAction($action, $id);
            break;
*/
    }
    return $params;
}





