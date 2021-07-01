<?php

namespace DesignPatterns\Behavioral\Memento;

use DesignPatterns\Behavioral\Memento\IMemento;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Memento
 */
class DataMemento implements IMemento
{
    private $state;
    private $date;

    /**
     * @param $state
     */
    public function __construct($state)
    {
        $this->state = $state;
        $this->date  = (new \DateTime())->format('Y-m-d H:i:s');
    }

    /**
     * @inheritDoc
     */
    public function getState()
    {
        return $this->state;
    }

    public function getDate()
    {
        return $this->date;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return "{$this->date} / " . substr($this->state, 0, 20) . "...)";
    }
}
