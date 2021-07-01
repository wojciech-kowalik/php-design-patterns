<?php

namespace DesignPatterns\Structural\Adapter;

use DesignPatterns\Structural\Adapter\IRenderTemplate;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Adapter
 */
class RenderHTMLTemplate implements IRenderTemplate
{
    /**
     * @inheritDoc
     */
    public function renderHeader(): string
    {
        return "<html><body>";
    }

    /**
     * @inheritDoc
     */
    public function renderBody(): string
    {
        return "<div>Content</div>";
    }

    /**
     * @inheritDoc
     */
    public function renderFooter(): string
    {
        return "</body></html>";
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return "header: {$this->renderHeader()} \nbody: {$this->renderBody()} \nfooter: {$this->renderFooter()} \n";
    }

}
