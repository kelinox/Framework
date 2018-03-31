<?php
namespace App\Blog;

use Framework\Renderer\RendererInterface;
use Framework\Router;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogModule
{
    /**
     * @var RendererInterface
     */
    private $renderer;

    /**
     * BlogModule constructor.
     * @param Router $router
     * @param RendererInterface $renderer
     */
    public function __construct(Router $router, RendererInterface $renderer)
    {
        $this->renderer = $renderer;
        $this->renderer->addPath('blog', __DIR__ . '/Views');

        $router->get('/blog', [$this, 'index'], 'blog.index');
        $router->get('/blog/{slug:[a-z0-9\-]+}', [$this, 'show'], 'blog.show');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function index(Request $request): string
    {
        return $this->renderer->render('@blog/index');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function show(Request $request): string
    {
        return $this->renderer->render('@blog/show', [
            'slug' => $request->getAttribute('slug')
        ]);
    }
}
