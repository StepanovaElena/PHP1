<?php
//Функция построения меню
function renderMenu($menu, $class) {
    $out = "<ul {$class}>";

    foreach ($menu as $item) {
        if (!isset($item['role'])) {
            $out .= "<li><a href='" . $item['url'] . "'>" . $item['item'] . "</a></li>";
        } else {
            if (userRole($item['role'])) {
                $out .= "<li><a href='" . $item['url'] . "'>" . $item['item'] . "</a></li>";
            }
        }

    }
    $out .= '</ul>';
    return $out;
}
