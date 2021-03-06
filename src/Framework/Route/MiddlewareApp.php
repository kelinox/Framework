<?php
namespace Framework\Route;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class MiddlewareApp implements MiddlewareInterface
{

    /**
     * @var string|callable
     */
    private $callback;

    /**
     * MiddlewareApp constructor.
     * @param string|callable $callback
     */
    public function __construct($callback)
    {
        $this->callback = $callback;
    }

    /**
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface|null $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler = null): ResponseInterface
    {
        return $this->process($request, $handler);
    }

    /**
     * @return string|callable
     */
    public function getCallback()
    {
        return $this->callback;
    }
}
