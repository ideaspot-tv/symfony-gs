<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XSS Example</title>
</head>
<body>

<?php if ($_REQUEST['name'] ?? null): ?>
    <div>Hello <strong><?= $_REQUEST['name'] ?></strong>!</div>
<?php else: ?>
    <div>Enter your name:</div>
<?php endif; ?>

<form>
    <input type="text" name="name" value="<?= $_REQUEST['name'] ?? '' ?>">
</form>
</body>
</html>

<?php
// <script>alert('hello!')</script>
