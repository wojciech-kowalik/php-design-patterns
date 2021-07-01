<?php

namespace DesignPatterns\Structural\Composite;

use DesignPatterns\Structural\Composite\FieldComposite;

/**
 * Concrete composite class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Composite
 */
class Form extends FieldComposite
{
    protected $url;

    public function __construct(string $name, string $title, string $url)
    {
        parent::__construct($name, $title);
        $this->url = $url;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        $output = parent::render();
        return "<form action=\"{$this->url}\">\n<h3>{$this->title}</h3>\n{$output}</form>\n";
    }

}
