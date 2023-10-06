<?php // index.php
$connection = new PDO("sqlite:" . __DIR__ . "/flat.db");

$result = $connection->query('SELECT id, title FROM post');
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>List of Posts</title>
    </head>
    <body>
    <h1>List of Posts</h1>
    <ul>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <li>
                <a href="/show.php?id=<?= $row['id'] ?>">
                    <?= $row['title'] ?>
                </a>
            </li>
        <?php endwhile ?>
    </ul>
    </body>
    </html>

<?php
$connection = null;

// based on https://symfony.com/doc/current/introduction/from_flat_php_to_symfony.html
?>
