<?php // model.php
function open_database_connection()
{
    $connection = new PDO("sqlite:" . __DIR__ . "/flat.db");

    return $connection;
}

function close_database_connection(&$connection)
{
    $connection = null;
}

function get_all_posts()
{
    $connection = open_database_connection();

    $result = $connection->query('SELECT id, title FROM post');

    $posts = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = $row;
    }
    close_database_connection($connection);

    return $posts;
}

function get_post_by_id($id)
{
    $connection = open_database_connection();

    $sql = 'SELECT id, title, created_at, body FROM post WHERE id=:id';
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $post = $statement->fetch(PDO::FETCH_ASSOC);

    close_database_connection($connection);

    return $post;
}

// based on https://symfony.com/doc/current/introduction/from_flat_php_to_symfony.html
