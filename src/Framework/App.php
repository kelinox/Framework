<?php

namespace Framework;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class App
 * @package Framework
 */
class App
{

    private $modules = [];

    /**
     * App constructor.
     * @param array $modules
     */
    public function __construct(array $modules = [])
    {
        $router = new Router();
        foreach($modules as $module) {
            $this->modules[] = new $module();
        }
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();
        if (!empty($uri) && $uri[-1] === '/') {
            return (new Response())
                ->withStatus('301')
                ->withHeader('Location', substr($uri, 0, -1));
        } elseif (!empty($uri) && $uri === '/blog') {
            return new Response(200, [], '<h1>Bienvenue sur le blog</h1>');
        }
        return new Response(404, [], '<h1>Error 404</h1>');
    }
}
