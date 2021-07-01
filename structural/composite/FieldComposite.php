<?php

namespace DesignPatterns\Structural\Composite;

use DesignPatterns\Structural\Composite\FormElement;

/**
 * Composite class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Composite
 */
abstract class FieldComposite extends FormElement
{
    protected $fields = [];

    /**
     * @param \DesignPatterns\Structural\Composite\FormElement $formElement
     * @return void
     */
    public function add(FormElement $formElement)
    {
        $name                = $formElement->getName();
        $this->fields[$name] = $formElement;
    }

    /**
     * @param \DesignPatterns\Structural\Composite\FormElement $formElement
     * @return void
     */
    public function remove(FormElement $formElement)
    {
        $this->fields = array_filter($this->filter, function ($child) use ($formElement) {
            return ($child == $formElement);
        });
    }

    /**
     * @inheritDoc
     */
    public function setData($data): void
    {
        foreach ($this->fields as $name => $field) {
            if (isset($data[$name])) {
                $field->setData($data[$name]);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function render(): string
    {
        $output = "";

        foreach ($this->fields as $name => $field) {
            $output .= $field->render();
        }

        return $output;
    }

}
