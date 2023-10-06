<?php // index.php

require_once __DIR__ . '/model.php';
require_once __DIR__ . '/controllers.php';

// route the request internally
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($uri === '/index.php' || $uri === '/') {
    list_action();
} elseif (($uri === '/index.php/show' || $uri == '/show') && isset($_GET['id'])) {
    show_action($_GET['id']);
} else {
    http_response_code(404);
    echo '<html><body><h1>Page Not Found</h1></body>';
}

// based on https://symfony.com/doc/current/introduction/from_flat_php_to_symfony.html
