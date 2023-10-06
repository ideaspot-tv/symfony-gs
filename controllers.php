<?php // controllers.php

function list_action()
{
    $posts = get_all_posts();

    require __DIR__.'/templates/list.html.php';
}

function show_action($id)
{
    $post = get_post_by_id($_REQUEST['id']);

    require __DIR__.'/templates/show.html.php';
}

// based on https://symfony.com/doc/current/introduction/from_flat_php_to_symfony.html
