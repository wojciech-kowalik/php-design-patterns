<?php

namespace DesignPatterns\Behavioral\Memento;

use DesignPatterns\Behavioral\Memento\Originator;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Memento
 */
class Caretaker
{
    /**
     * @var Memento[]
     */
    private $mementos = [];

    /**
     * @var Originator
     */
    private $originator;

    /**
     * @param \DesignPatterns\Behavioral\Memento\Originator $originator
     */
    public function __construct(Originator $originator)
    {
        $this->originator = $originator;
    }

    /**
     * @return void
     */
    public function backup()
    {
        print("Caretaker: Save state ");
        $this->mementos[] = $this->originator->save();
    }

    /**
     * @return void
     */
    public function undo()
    {
        if (!count($this->mementos)) {
            return;
        }
        $memento = array_pop($this->mementos);

        print("Caretaker: Restoring state to: " . $memento->getName() . "\n");
        try {
            $this->originator->restore($memento);
        } catch (\Exception $e) {
            $this->undo();
        }
    }

    /**
     * @return void
     */
    public function showHistory()
    {
        print("Caretaker: Here's the list of mementos:\n");
        foreach ($this->mementos as $memento) {
            print($memento->getName() . "\n");
        }
    }

}
