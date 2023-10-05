<?php

// read request
$uri = $_SERVER['REQUEST_URI'];
$foo = $_GET['foo'] ?? null;

// write response
header('Content-Type: text/html');
echo "The URI requested is: <pre>$uri</pre><br>\n";
echo "The value of the <pre>foo</pre> parameter is: <pre>$foo</pre>";
