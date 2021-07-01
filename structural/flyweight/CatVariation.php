<?php

namespace DesignPatterns\Structural\Flyweight;

/**
 * The Flyweight class represents internal state (intrinsic state)
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Flyweight
 */
class CatVariation
{
    public $breed;
    public $image;
    public $color;
    public $texture;
    public $fur;
    public $size;

    public function __construct($name, $image, $color, $texture, $fur, $size)
    {
        $this->breed   = $breed;
        $this->image   = $image;
        $this->color   = $color;
        $this->texture = $texture;
        $this->fur     = $fur;
        $this->size    = $size;
    }

    /**
     * @param string $name
     * @param integer $age
     * @param string $owner
     * @return void
     */
    public function renderProfile(string $name, int $age, string $owner)
    {
        print("= $name =\n");
        print("Age: $age\n");
        print("Owner: $owner\n");
        print("Breed: $this->breed\n");
        print("Image: $this->image\n");
        print("Color: $this->color\n");
        print("Texture: $this->texture\n");
    }

}
