<?php
namespace App\Blog;

use App\Blog\Actions\BlogActions;
use Framework\Module;
use Framework\Renderer\RendererInterface;
use Framework\Router;

class BlogModule extends Module
{

    const DEFINITIONS = __DIR__ . '/config.php';

    /**
     * BlogModule constructor.
     * @param string $prefix
     * @param Router $router
     * @param RendererInterface $renderer
     */
    public function __construct(string $prefix, Router $router, RendererInterface $renderer)
    {
        $renderer->addPath('blog', __DIR__ . '/Views');

        $router->get($prefix, BlogActions::class, 'blog.index');
        $router->get($prefix . '/{slug:[a-z0-9\-]+}', BlogActions::class, 'blog.show');
    }
}
