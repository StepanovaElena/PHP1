<?php

/*Вывод комментариев*/
function displayComments($id) {
    $sql = "SELECT * FROM feedback WHERE (product_id = {$id} and status = 'confirmed')";
    $fb = getAssocResult($sql);

    if(!empty($fb)) {
        return $fb;
    }else{
        return $fb = 'There are no feedbacks for this product yet.';
    }
}

/*Добавление отзыва в БД*/
function addComments($id) {

    if (empty($_POST['name']) || empty($_POST['text'])) {
        return $error = 11;
    }

    $db = getDb();
    $name = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['name'])));
    $text = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['text'])));
    $data = date("Y-m-d");

    //if (loggedUser()) {
    //    $user = userSearch();

    //    $sql = "INSERT INTO feedback (name, feedback, product_id, user_id, date, status) VALUES('{$name}','{$text}', '{$id}','{$user['id']}', '{$data}', 'new')";
    //} else {
        $sql = "INSERT INTO feedback (name, feedback, product_id, date, status, likes) VALUES('{$name}','{$text}', '{$id}', '{$data}', 'new', '0')";
    //}

    executeQuery($sql);

    return $error = 12;
}

//Увеличим число лайков на 1 одним запросом к базе
function addLikes($id){
    $sql = "UPDATE `feedback` SET `likes` = `likes` + 1 WHERE id = {$id}";
    executeQuery($sql);
}

//Обработка отзывов на стренице admin
function doFeedbackAction($action, $id) {

    if ($action == "delete") {
        delFeedBack($id);
        header("Location: /admin/?status=deleted");
    }

    if ($action == "confirm") {
            $sql = "UPDATE feedback SET status = 'confirmed' WHERE id={$id}";
            executeQuery($sql);
        header("Location: /admin/?status=confirmed");
    }

    $params = getAllFeedback();

    return $params;
}
//Получение всех отзывов со статусом NEW
function getAllFeedback() {

    $sql = "SELECT * FROM feedback WHERE status = 'new' ORDER BY id DESC ";

    return getAssocResult($sql);
}
//Удаление отзыва
function delFeedBack($id) {
    $id = (int)$id;
    $sql = "DELETE FROM feedback WHERE id = {$id}";
    return executeQuery($sql);
}

//получение конкретного отзыва
function getOneFeedBack($id) {
    $id = (int)$id;

    $sql = "SELECT * FROM feedback WHERE id = {$id}";

    $item = getAssocResult($sql);

    $result = [];
    if (isset($item[0]))
        $result = $item[0];

    return $result;
}