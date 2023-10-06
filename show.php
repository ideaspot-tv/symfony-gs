<?php // show.php

require_once __DIR__ . '/model.php';

$post = get_post_by_id($_REQUEST['id']);

require __DIR__.'/templates/show.html.php';

// based on https://symfony.com/doc/current/introduction/from_flat_php_to_symfony.html
