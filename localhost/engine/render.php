<?php

function render($page, $params = []) {

    $menu = [
        ['item' => 'Home', 'url' => '/'],
        ['item' => 'Products', 'url' => '/products/'],
        ['item' => 'Cart', 'url' => '/cart/'],
        ['item' => 'Personal account', 'url' => '/account/', 'role' => '+'],
        ['item' => 'Admin', 'url' => '/admin/', 'role' => 'admin'],
    ];


    if (!$params['is_ajax']) {
        return renderTemplate(LAYOUTS_DIR . 'main', [
            'content' => renderTemplate($page, $params),
            'menu' => renderMenu($menu,'class=topmenu'),
            'auth' => renderTemplate('auth', $params)
        ]);
    } else {

       return json_encode($params);
    }
}

function renderTemplate($page, $params = []) {

    ob_start();

    if (!is_null($params)) {
        extract($params);
    }

    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die('Страницы не существует 404');
    }

    return ob_get_clean();
}