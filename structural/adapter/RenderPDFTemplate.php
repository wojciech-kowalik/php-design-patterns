<?php

namespace DesignPatterns\Structural\Adapter;

use DesignPatterns\Structural\Adapter\IPDFTemplate;

/**
 * Adaptee class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\Builder
 */
class RenderPDFTemplate implements IPDFTemplate
{
    /**
     * @inheritDoc
     */
    public function renderTop(): string
    {
        return "Top of the PDF";
    }

    /**
     * @inheritDoc
     */
    public function renderMiddle(): string
    {
        return "Content";
    }

    /**
     * @inheritDoc
     */
    public function renderBottom(): string
    {
        return "Bottom of the PDF";
    }

}
