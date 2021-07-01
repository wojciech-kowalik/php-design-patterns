<?php

namespace DesignPatterns\Creational\Prototype;

/**
 * Abstract prototype
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\Prototype
 */
abstract class BookPrototype
{
    protected $title;
    protected $topic;

    /**
     * @inheritDoc
     */
    abstract public function __clone();

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $topic
     * @return void
     */
    public function setTopic(string $topic): void
    {
        $this->topic = $topic;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return "Book title: {$this->title}, topic: {$this->topic}\n";
    }

}
