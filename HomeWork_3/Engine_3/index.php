<?php
define("TEMLATES_DIR", './views/');
define("LAYOUTS_DIR", 'layout/');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

$params = [];
switch ($page) {
    case 'index':
        $params = [
            "username" => "Вася"
        ];
        break;
    case 'catalog':
        $params = ["catalog" => [
            "Спички",
            "Кружка",
            "Ведро"
        ]
        ];
        break;
    case 'api_catalog':
        $params = ["catalog" => [
            "Спички",
            "Кружка",
            "Ведро"
        ]
        ];
        echo json_encode($params, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
        die();

}

echo render($page, $params);


function render($page, $params = []) {

    $menu = [
        'Home',
        'Work' => ['Subitem 1', 'Subitem 2', 'Subitem 3'],
        'About' => ['Subitem 1',
            'Subitem 2' => ['Subsubitem 1', 'Subsubitem 2']
        ],
        'Blog',
        'Contacts'
    ];

    return renderTemplate(LAYOUTS_DIR . 'layout', [
        "content" => renderTemplate($page, $params),
        "menu" => menuRender($menu, 'class="topmenu"')
    ]);
}


function renderTemplate($page, $params = []) {

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

function menuRender($arr, $classUl) {

    $menuArr[] = '<ul ' . $classUl . '>';

    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            $classUl = 'class="submenu"';
            $menuArr[] = '<li> <a href="#">' . $key . menuRender($value, $classUl) . '</a></li>';
        } else {
            $menuArr[] = '<li> <a href="#">' . $value . '</a></li>';
        }
    }

    $menuArr[] = '</ul>';

    return implode($menuArr);
}
