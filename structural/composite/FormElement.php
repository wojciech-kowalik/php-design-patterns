<?php

namespace DesignPatterns\Structural\Composite;

/**
 * Component class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Composite
 */
abstract class FormElement
{
    protected $name;
    protected $title;
    protected $data;

    /**
     * @param string $name
     * @param string $title
     */
    public function __construct(string $name, string $title)
    {
        $this->name  = $name;
        $this->title = $title;
    }

    /**
     * @param array $data
     * @return void
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    abstract public function render(): string;
}
