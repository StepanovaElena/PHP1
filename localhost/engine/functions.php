<?php

//Файл с функциями нашего движка

/*
 * Функция подготовки переменных для передачи их в шаблон
 */
function prepareVariables($page)
{
//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
    $params = [];
    switch ($page) {

        case 'index':
            $params["username"] ="Вася";
            break;


        case 'image_page':

            counters($_GET['id']);
            $content = getItemContent("SELECT * FROM gallery WHERE id = {$_GET['id']}");
            $params['name'] = $content['name'];
            $params['views'] = $content['views'];
            $params['path'] = $content['link'].$content['name'];
             break;

        case 'gallery':

            $error_msg = ' ';
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 1) $error_msg = 'Downloading files with such extension is not allowed! :(';
                if ($_GET['error'] == 2) $error_msg = 'File size over 8 MB! :(';
                if ($_GET['error'] == 3) $error_msg = 'Error loading file :(';
                if ($_GET['error'] == 4) $error_msg = 'A file with such name already exist! :(';
                if ($_GET['error'] == 5) $error_msg = 'Error loading file :(';
                if ($_GET['error'] == 0) $error_msg = 'Successful file loading :)';
            }

            if ($_POST['submit']) {
                $error = imageLoading();
                header("Location: ?&error={$error}");
            }

            $params = [
                "gallery" => getGallery(),
                "error" => $error_msg
            ];
            break;

        case 'products':
            $params = [
                "products" => getProducts(),
            ];
            break;

        case 'single_page':

            $error_prod = ' ';
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 11) $error_prod = 'Fields are filled incorrectly :(';
                if ($_GET['error'] == 12) $error_prod = 'Feedback sent successfully :)';
            }


                $content = getItemContent("SELECT * FROM products WHERE id = {$_GET['id']}");

                $params['id'] = $_GET['id'];
                $params['fb'] = displayComments($_GET['id']);
                $params['material'] = $content['material'];
                $params['price'] = $content['price'];
                $params['designer'] = $content['designer'];
                $params['discription'] = $content['discription'];
                $params['image'] = $content['image'];
                $params['name'] = $content['name'];
                $params['error'] = $error_prod;

            if ($_POST['submit']) {
                $error = addComments($_POST['id']);
                header("Location: ?&error={$error}");
            }
        break;
    }
    return $params;
}

//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = []) {

    $menu = [
        'Home'=>'/',
        'Gallery' =>'/gallery/',
        'Products' => '/products/',
        'About' => '/about/',
        'Reviews'=>'/reviews/',
        'Contacts'=>'/contacts/',
    ];

    return renderTamplate(LAYOUTS_DIR . 'layout', [
        "content" => renderTamplate($page, $params),
        "menu" => renderMenu($menu,'class=topmenu')
    ]);
}


//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTamplate($page, $params = [])
{
    ob_start();

    if (!is_null($params)) {
        extract($params);
    }


    $fileName = TEMLATES_DIR . $page . '.php';

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Страницы не существует, 404");
    }

    return ob_get_clean();
}

//Функция построения меню

function renderMenu($menu, $class) {
    $out = "<ul {$class}>";
    foreach ($menu as $name => $href) {
        if (is_array($href)) {
            $class = 'class = "submenu"';
            $out .= "<li><a href='#'>" . $name . "</a>" . renderMenu($href, $class)."</li>";
        } else {
            $out .= "<li><a href=\"{$href}\">{$name}</a></li>";
        }
    }
    $out .= '</ul>';
    return $out;
}

//Изменение размера файлов

function create_thumbnail($path, $save, $width, $height){

    $info = getimagesize($path); //получаем размеры картинки и ее тип

    $size = [$info[0], $info[1]]; //закидываем размеры в массив

    //В зависимости от расширения картинки вызываем соответствующую функцию

    if ($info['mime'] == 'image/png') {
        $src = imagecreatefrompng($path);
    } elseif ($info['mime'] == 'image/jpeg') {
        $src = imagecreatefromjpeg($path);
    } elseif ($info['mime'] == 'image/gif') {
        $src = imagecreatefromgif($path);
    } else {
        return false;
    }

    $thumb = imagecreatetruecolor($width, $height); //возвращает идентификатор изображения, представляющий черное изображение заданного размера

    $src_aspect = $size[0] / $size[1]; //отношение ширины к высоте исходника

    $thumb_aspect = $width / $height; //отношение ширины к высоте аватарки

    if ($src_aspect < $thumb_aspect) {

        //узкий вариант (фиксированная ширина)
        //$scale = $width / $size[0];
        //$new_size = array($width, $width / $src_aspect);
        //$src_pos = array(0, ($size[1] * $scale - $height) / $scale / 2);
        //Ищем расстояние по высоте от края картинки до начала картины после обрезки
        //} else if ($src_aspect > $thumb_aspect) {


        //широкий вариант (фиксированная высота)
        $scale = $height / $size[1];
        $new_size = [$height * $src_aspect, $height];
        $src_pos = [($size[0] * $scale - $width) / $scale / 2, 0]; //Ищем расстояние по ширине от края картинки до начала картины после обрезки

    } else {
        //другое
        $new_size = [$width, $height];
        $src_pos = [0, 0];
    }

    $new_size[0] = max($new_size[0], 1);
    $new_size[1] = max($new_size[1], 1);

    //Копирование и изменение размера изображения с ресемплированием
    imagecopyresampled($thumb, $src, 0, 0, $src_pos[0], $src_pos[1], $new_size[0], $new_size[1], $size[0], $size[1]);

    return imagejpeg($thumb, $save);
}

//Функция загрузки изображений

function imageLoading () {

    if (!empty($_FILES['userfile'])) {

        $file = $_FILES['userfile'];

        $srcFileName = $file['name'];

        $sizeFile = $file['size'];

        $filePath = $file['tmp_name'];

        $newFilePath = './img/img_big/' . $srcFileName;

        //Ограничение по загружаемым форматам
        $allowedExtensions = ['jpg', 'png', 'gif'];
        //Ограничение по объему файла
        $maxFile = 1024 * 1024 * 8;
        //Получение расширения файла
        $extension = pathinfo($srcFileName, PATHINFO_EXTENSION);

        //Проверка на формат файла
        if (!in_array($extension, $allowedExtensions)) {
            return $error = 1;

            //Проверка файла на размер
        } elseif ($sizeFile > $maxFile || ($file['error'] == UPLOAD_ERR_INI_SIZE)) {
            return $error = 2;

            //Проверка успешной загрузке на сервер временного файла
        } elseif ($file['error'] !== UPLOAD_ERR_OK) {
            return $error = 3;

            //Проверка на существоввние файла с таким именем
        } elseif (file_exists($newFilePath)) {
            return $error = 4;

            //Перемещение файла из врменной паки в указанную
        } elseif (!move_uploaded_file($filePath, $newFilePath)) {
            //Ошибка при перемещении файла из временной папки
            return $error = 5;

        } else {
            //Загрузка файла из временной папки в конечную
            move_uploaded_file($filePath, $newFilePath);
            //Выводим сообщение об удачной загрузке файла
            /*Добавляем запись о новом файле в БД*/
            $sql = "INSERT INTO gallery (link, size, name, views) VALUES ('" .'../img/img_big/'. "', '" . $sizeFile . "', '" . $srcFileName . "', '0')";
            executeQuery($sql);
            //Создаем уменьшенную копию картинки
            create_thumbnail($newFilePath, './img/img_small/' . $srcFileName, '150', '100');
        }
        //Выводим сообщение об удачной загрузке файла
        return $error = 0;
    }
}

//получение данных из базы по id
function getItemContent($sql){

    $images = getAssocResult($sql);

    //В случае если новости нет, вернем пустое значение
    $result = [];
    if(isset($images[0]))
        $result = $images[0];

    return $result;
}

//получение данных галереи из базы
function getGallery () {
    $sql = "SELECT * FROM gallery ORDER BY views DESC";
    $gallery = getAssocResult($sql);
    return $gallery;
}

//Подсчет просмотров
function counters($id){
    $id = (int)$id;
    $sql = "SELECT views FROM gallery WHERE id = " . $id;
    $item = executeQuery($sql);
    $data = mysqli_fetch_all($item, MYSQLI_ASSOC)[0];
    $data['views']++;
    $sql = "UPDATE gallery SET views = " . $data['views'] . " WHERE id = " . $id;
    executeQuery($sql);
}

function getProducts () {
    $sql = "SELECT * FROM products";
    $products = getAssocResult($sql);
    return $products;
}

/*Вывод комментариев*/
function displayComments($id) {
    $sql = "SELECT * FROM feedback WHERE product_id = {$id}";
    $item = executeQuery($sql);
    $fb = mysqli_fetch_all($item, MYSQLI_ASSOC);

    if(isset($images[0])) {
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
    $name = $_POST['name'];
    $text = $_POST['text'];
    executeQuery("INSERT INTO feedback (name, feedback, product_id) VALUES('{$name}','{$text}', '{$id}')");
    return $error = 12;
}
