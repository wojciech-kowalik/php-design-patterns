<?php

namespace DesignPatterns\Structural\Bridge;

use DesignPatterns\Structural\Bridge\IRenderer;

/**
 * The Abstraction class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Bridge
 */
abstract class Page
{
    /**
     * The Implementation object
     * @var Renderer
     */
    protected $renderer;

    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param \DesignPatterns\Structural\Bridge\IRenderer $renderer
     * @return void
     */
    public function changeRenderer(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @return void
     */
    abstract public function view();
}
