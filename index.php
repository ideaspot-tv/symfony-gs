<?php // index.php

require_once __DIR__ . '/model.php';

$posts = get_all_posts();

require __DIR__.'/templates/list.html.php';

// based on https://symfony.com/doc/current/introduction/from_flat_php_to_symfony.html
