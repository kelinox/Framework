<?php
namespace  Tests\Framework;

use Framework\Renderer;
use PHPUnit\Framework\TestCase;

class RendererTest extends TestCase
{
    /**
     * @var
     */
    private $renderer;

    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->renderer = new Renderer\PHPRenderer(__DIR__ . '/Views');
    }

    public function testRenderTheRightPath()
    {
        $this->renderer->addPath('blog', __DIR__ . '/Views');
        $content = $this->renderer->render('@blog/demo');
        $this->assertEquals('Salut les gens', $content);
    }

    public function testRenderTheDefaultPath()
    {
        $content = $this->renderer->render('demo');
        $this->assertEquals('Salut les gens', $content);
    }

    public function testRenderWithParams()
    {
        $content = $this->renderer->render('demoParams', ['name' => 'Lucas']);
        $this->assertEquals('Salut Lucas', $content);
    }

    public function testGlogalParams()
    {
        $this->renderer->addGlobal('name', 'Lucas');
        $content = $this->renderer->render('demoParams');
        $this->assertEquals('Salut Lucas', $content);
    }


}