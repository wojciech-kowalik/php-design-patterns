<?php

namespace DesignPatterns\Behavioral\Memento;

use DesignPatterns\Behavioral\Memento\DataMemento;
use DesignPatterns\Behavioral\Memento\IMemento;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Memento
 */
class Originator
{
    private $state;

    public function __construct($state)
    {
        $this->state = $state;
        print("Originator: Initial state: {$this->state}\n");
    }

    /**
     * @return \DesignPatterns\Behavioral\Memento\IMemento
     */
    public function save(): IMemento
    {
        return new DataMemento($this->state);
    }

    /**
     * @param \DesignPatterns\Behavioral\Memento\IMemento $memento
     * @return void
     */
    public function restore(IMemento $memento)
    {
        if (!$memento instanceof ConcreteMemento) {
            throw new \Exception("Unknown memento class " . get_class($memento));
        }

        $this->state = $memento->getState();
        print("Originator: My state has changed to: {$this->state}\n");
    }

    /**
     * @return void
     */
    public function makeJob()
    {
        print("Originator: Generate data\n");
        $this->state = $this->generateRandomString(30);
        print("Originator: State has changed to: {$this->state}\n");
    }

    /**
     * @param integer $length
     * @return string
     */
    private function generateRandomString($length = 10)
    {
        return substr(
            str_shuffle(
                str_repeat(
                    $x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
                    ceil($length / strlen($x)))), 1, $length);
    }

}
