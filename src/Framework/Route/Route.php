<?php
namespace Framework\Route;

/**
 * Class Route
 * @package Framework\Router
 * Represent a route
 */
class Route
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var callable
     */
    private $callable;
    /**
     * @var string[]
     */
    private $params;

    /**
     * Route constructor.
     * @param string $name
     * @param string|callable $callable
     * @param array $params
     */
    public function __construct(string $name, $callable, array $params = [])
    {
        $this->name = $name;
        $this->callable = $callable;
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|callable
     */
    public function getCallback()
    {
        return $this->callable;
    }

    /**
     * Get URL parameters
     * @return string[]
     */
    public function getParams(): array
    {
        return $this->params;
    }
}
