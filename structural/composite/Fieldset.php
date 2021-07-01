<?php

namespace DesignPatterns\Structural\Composite;

use DesignPatterns\Structural\Composite\FieldComposite;

/**
 * Concrete composite class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Composite
 */
class Fieldset extends FieldComposite
{
    /**
     * @inheritDoc
     */
    public function render(): string
    {
        $output = parent::render();
        return "<fieldset><legend>{$this->title}</legend>\n{$output}</fieldset>\n";
    }

}
