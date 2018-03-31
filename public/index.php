<?php
require '../vendor/autoload.php';

use Framework\Renderer\TwigRenderer;


$renderer = new TwigRenderer(dirname(__DIR__) . '/Layout');

$loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/Layout');
$twig = new Twig_Environment($loader, []);

$app  = new \Framework\App([
    \App\Blog\BlogModule::class
], [
    'renderer' => $renderer
]);

$response = $app->run(\GuzzleHttp\Psr7\ServerRequest::fromGlobals());
Http\Response\send($response);