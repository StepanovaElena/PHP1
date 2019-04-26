<?php
//Проверка авторизован ли пользователь
function sessionUser() {

    $allow = false;

    if (loggedUser()) {
        $allow = true;
    }

    if (isset($_GET['logout'])) {
        logoutUser();
        header("Location: /");
    }

    if (isset($_POST['reg_user'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        registrateUser($login, $password);
    }

    if (isset($_POST['login_user'])) {

        $login = $_POST['login'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE user_login='{$login}'";

        $resultDB = getAssocResult($sql);
        $user = [];
        if (isset($resultDB[0])) $user = $resultDB[0];

        if ($user != false) {

            if (password_verify($password, $user['hash'])) {

                if (isset($_POST['remember'])) {
                    $allow = true;
                    loginUser($login, true);
                } else {
                    $allow = true;
                    loginUser($login);
                }

                //header("Location: /");
            }
        //} else {
        //    Die('Не верный логин пароль');
        }
    }
   return $allow;
}

function loggedUser (){

    if (isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];
        $sql = "SELECT * FROM `user` WHERE `hash`='{$hash}'";
        $row = getAssocResult($sql);
        $user = $row['login'];
        if (!empty($user)) {
            $_SESSION['auth']['login'] = $user;
        }
    }
    return isset($_SESSION['auth']['login']);
}

//Авторизация пользователя
function loginUser($login, $remember = false) {
    // загружаем пользователя из БД
    $sql = "select * from user where user_login='{$login}'";
    $result = getAssocResult($sql);
    //Проверка на пустое значение
    $user = [];
    if (isset($result[0])) {$user = $result[0];}
    // запоминаем логин в сессии
    $_SESSION['auth'] = [
        'id' => $user['id'],
        'login' => $user['user_login'],
    ];
    // если admin
    if ($login == 'admin') {
        //дополнительные права
        $_SESSION['auth']['admin'] = true;
    }
    // если "запомнить меня"
    if ($remember) {
        $auth = [
            'login' => $_SESSION['auth']['login'],
        ];
        setCook();
    }
}
//Выход из системы
function logoutUser() {
    unset($_SESSION['auth']);
    session_destroy();
    //header("Location: /");
}
//Регистрация пользователя
function registrateUser($login, $password) {
    // хешируем пароль
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    // готовим запрос SQL
    $sql = "insert into user (`user_login`, `user_pass`, `hash`) values ('{$login}', '{$password}', '{$passwordHash}')";
    if (executeQuery($sql)) {
        // авторизуем
        loginUser($login/*,true*/);
        header("Location: /index/");
    }
}
// Проверка прав пользователя для показа блоков в меню
function userRole($role) {
    if ($role == '?') return !loggedUser();
    if ($role == '+') return loggedUser();
    if ($role == 'admin') return isAdmin();
    return false;
}
//Проверка на администратора
function isAdmin() {
    return (isset($_SESSION['auth']['admin']) && $_SESSION['auth']['admin']);
}

//Создание записи cookie
function setCook() {
    $hash = uniqid(rand(), true);
    $db = getDb();
    $id = mysqli_real_escape_string($db, strip_tags(stripslashes($_SESSION['id'])));
    $sql = "UPDATE `user` SET `hash` = '{$hash}' WHERE `user`.`user_id` = {$id}";

    setcookie("hash", $hash, time() + 3600);

    executeQuery($sql);

    header("Location: /");
}

