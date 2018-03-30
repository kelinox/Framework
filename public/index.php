<?php

use function Http\Response\send;

require '../vendor/autoload.php';

$app  = new \Framework\App([
    \App\Blog\BlogModule::class
]);

$response = $app->run(\GuzzleHttp\Psr7\ServerRequest::fromGlobals());
send($response);