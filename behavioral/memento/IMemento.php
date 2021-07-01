<?php

namespace DesignPatterns\Behavioral\Memento;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Memento
 */
interface IMemento
{
    /**
     * @return string
     */
    public function getName(): string;
    public function getDate();
}
