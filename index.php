<?php

use Symfony\Component\HttpFoundation\Request;
require_once __DIR__ . '/vendor/autoload.php';

// read request
$request = Request::createFromGlobals();
$uri = $request->getPathInfo();
$foo = $request->get('foo', 'not set');

// write response
header('Content-Type: text/html');
echo "The URI requested is: <pre>$uri</pre><br>\n";
echo "The value of the <pre>foo</pre> parameter is: <pre>$foo</pre>";
