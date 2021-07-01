<?php

namespace DesignPatterns\Behavioral\Iterator;

use DesignPatterns\Behavioral\Iterator\WordsCollection;

/**
 * The Iterator class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Iterator
 */
class AlphabeticalOrderIterator implements \Iterator
{
    /**
     * @var WordsCollection
     */
    private $collection;

    /**
     * @var integer
     */
    private $position = 0;

    /**
     * @var boolean
     */
    private $reverse = false;

    /**
     * @param \DesignPatterns\Behavioral\Iterator\WordsCollection $collection
     * @param boolean $reverse
     */
    public function __construct(WordsCollection $collection, bool $reverse = false)
    {
        $this->collection = $collection;
        $this->reverse    = $reverse;
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        $this->position = $this->reverse ?
        count($this->collection->getItems()) - 1 : 0;
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return $this->collection->getItems()[$this->position];
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        $this->position = $this->position + ($this->reverse ? -1 : 1);
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return isset($this->collection->getItems()[$this->position]);
    }

}
