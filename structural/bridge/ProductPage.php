<?php

namespace DesignPatterns\Structural\Bridge;

use DesignPatterns\Structural\Bridge\IRenderer;
use DesignPatterns\Structural\Bridge\Page;
use DesignPatterns\Structural\Bridge\Product;

/**
 * The Concrete Abstraction class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Bridge
 */
class ProductPage extends Page
{
    protected $product;

    public function __construct(IRenderer $renderer, Product $product)
    {
        parent::__construct($renderer);
        $this->product = $product;
    }

    /**
     * @inheritDoc
     */
    public function view(): string
    {
        return $this->renderer->renderParts([
            $this->renderer->renderHeader(),
            $this->renderer->renderTitle($this->product->getTitle()),
            $this->renderer->renderTextBlock($this->product->getDescription()),
            $this->renderer->renderImage($this->product->getImage()),
            $this->renderer->renderLink("/cart/add/" . $this->product->getId(), "Add to cart"),
            $this->renderer->renderFooter(),
        ]);
    }

}
