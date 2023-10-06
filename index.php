<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/vendor/autoload.php';

// read request
$request = Request::createFromGlobals();
$uri = $request->getPathInfo();


// choose page base on URI and prepare the response
if (in_array($uri, ['', '/'])) {
    $response = new Response('This is home page!');
} elseif ($uri === '/contact') {
    $response = new Response('This is a contact page!');
} elseif ($uri == '/blog') {
    $response = new Response('This is a blog page!');
} else {
    $response = new Response('Not found.', Response::HTTP_NOT_FOUND);
}


// send response
$response->send();
