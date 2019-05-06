<?php
define('SITE_TITLE', 'Урок 5');

define("TEMPLATES_DIR", "../templates/");
define("ENGINE_DIR", "../engine/");
define("LAYOUTS_DIR", "/layouts/");
define("ADMIN_DIR", "/admin/");

/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'geek_project');

include_once ENGINE_DIR . 'controller.php';
include_once ENGINE_DIR . 'db.php';
include_once ENGINE_DIR . 'log.php';
include_once ENGINE_DIR . 'feedback.php';
include_once ENGINE_DIR . 'cart.php';
include_once ENGINE_DIR . 'render.php';
include_once ENGINE_DIR . 'products.php';
include_once ENGINE_DIR . 'auth.php';
include_once ENGINE_DIR . 'menu.php';
include_once ENGINE_DIR . 'orders.php';