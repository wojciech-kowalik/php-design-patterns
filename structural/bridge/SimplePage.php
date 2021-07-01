<?php

namespace DesignPatterns\Structural\Bridge;

use DesignPatterns\Structural\Bridge\IRenderer;
use DesignPatterns\Structural\Bridge\Page;

/**
 * The Concrete Abstraction class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Bridge
 */
class SimplePage extends Page
{
    protected $title;
    protected $content;

    /**
     * @param \DesignPatterns\Structural\Bridge\IRenderer $renderer
     * @param string $title
     * @param string $content
     */
    public function __construct(IRenderer $renderer, string $title, string $content)
    {
        parent::__construct($renderer);
        $this->title   = $title;
        $this->content = $content;
    }

    /**
     * @inheritDoc
     */
    public function view(): string
    {
        return $this->renderer->renderParts([
            $this->renderer->renderHeader(),
            $this->renderer->renderTitle($this->title),
            $this->renderer->renderTextBlock($this->content),
            $this->renderer->renderFooter(),
        ]);
    }

}
