<?php

namespace DesignPatterns\Structural\Composite;

use DesignPatterns\Structural\Composite\FormElement;

/**
 * Component class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Composite
 */
class Input extends FormElement
{
    protected $type;

    /**
     * @param string $name
     * @param string $title
     * @param string $type
     */
    public function __construct(string $name, string $title, string $type)
    {
        parent::__construct($name, $title);
        $this->type = $type;
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        return "<label for=\"{$this->name}\">{$this->title}</label>\n" .
            "<input name=\"{$this->name}\" type=\"{$this->type}\" value=\"{$this->data}\">\n";
    }

}
