<?php

use Framework\Renderer\RendererInterface;
use Framework\Renderer\TwigRendererFactory;
use Framework\Route\RouterTwigExtension;
use Framework\Router;
use function \DI\{autowire, factory};

return [
    'database.host' => 'localhost',
    'database.username' => 'root',
    'database.password' => 'root',
    'database.name' => 'site',
    'views.path' => dirname(__DIR__) . '/Layout',
    'twig.extensions' => [
        \DI\get(RouterTwigExtension::class)
    ],
    Router::class => autowire(),
    RendererInterface::class => factory(TwigRendererFactory::class)
];
