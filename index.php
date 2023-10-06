<?php // index.php
$connection = new PDO("sqlite:" . __DIR__ . "/flat.db");

$result = $connection->query('SELECT id, title FROM post');

$posts = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $posts[] = $row;
}

$connection = null;

require __DIR__.'/templates/list.html.php';

// based on https://symfony.com/doc/current/introduction/from_flat_php_to_symfony.html
