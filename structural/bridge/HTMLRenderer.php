<?php

namespace DesignPatterns\Structural\Bridge;

use DesignPatterns\Structural\Bridge\IRenderer;

/**
 * The Concrete Implementation
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Bridge
 */
class HTMLRenderer implements IRenderer
{
    /**
     * @inheritDoc
     */
    public function renderTitle(string $title): string
    {
        return "<h1>{$title}</h1>";
    }

    /**
     * @inheritDoc
     */
    public function renderTextBlock(string $text): string
    {
        return "<div class='text'>$text</div>";
    }

    /**
     * @inheritDoc
     */
    public function renderImage(string $url): string
    {
        return "<img src='$url'>";
    }

    /**
     * @inheritDoc
     */
    public function renderLink(string $url, string $title): string
    {
        return "<a href='$url'>$title</a>";
    }

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
    public function renderFooter(): string
    {
        return "</body></html>";
    }

    /**
     * @inheritDoc
     */
    public function renderParts(array $parts): string
    {
        return implode("\n", $parts);
    }

}
