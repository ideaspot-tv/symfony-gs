<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/vendor/autoload.php';

// read request
$request = Request::createFromGlobals();
$uri = $request->getPathInfo();
$foo = $request->get('foo', 'not set');

// prepare response
$response = new Response();
$response->setContent(<<<EOT
<html>
<body>
The URI requested is: <pre>$uri</pre><br>
The value of the <pre>foo</pre> parameter is: <pre>$foo</pre>
</body>
</html>
EOT);
$response->setStatusCode(Response::HTTP_OK);
$response->headers->set('Content-Type', 'text/html');

// send response
$response->send();
