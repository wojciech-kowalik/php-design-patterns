<?php

namespace DesignPatterns\Structural\Bridge;

/**
 * Helper class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Bridge
 */
class Product
{
    private $id, $title, $description, $image, $price;

    public function __construct($id, $title, $description, $image, $price)
    {
        $this->id          = $id;
        $this->title       = $title;
        $this->description = $description;
        $this->image       = $image;
        $this->price       = $price;
    }

    /**
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
}
