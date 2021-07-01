<?php

namespace DesignPatterns\Behavioral\Iterator;

use DesignPatterns\Behavioral\Iterator\AlphabeticalOrderIterator;

/**
 * The Iterator class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Iterator
 */
class WordsCollection implements \IteratorAggregate
{
    /**
     * @var array
     */
    private $items = [];

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $item
     * @return void
     */
    public function addItem($item)
    {
        \array_push($this->items, $item);
    }

    /**
     * @return \Iterator
     */
    public function getIterator(): \Iterator
    {
        return new AlphabeticalOrderIterator($this);
    }

    /**
     * @return \Iterator
     */
    public function getReverseIterator(): \Iterator
    {
        return new AlphabeticalOrderIterator($this, true);
    }

}
