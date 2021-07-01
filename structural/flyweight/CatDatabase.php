<?php

namespace DesignPatterns\Structural\Flyweight;

use DesignPatterns\Structural\Flyweight\Cat;
use DesignPatterns\Structural\Flyweight\CatVariation;

/**
 * The Flyweight Factory
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Flyweight
 */
class CatDatabase
{
    /**
     * Array of context objects
     * @var array
     */
    private $cats = [];

    /**
     * Array of flyweight objects
     * @var array
     */
    private $variations = [];

    /**
     * @param string $name
     * @param string $age
     * @param string $owner
     * @param string $breed
     * @param string $image
     * @param string $color
     * @param string $texture
     * @param string $fur
     * @param string $size
     * @return void
     */
    public function addCat($name, $age, $owner, $breed, $image, $color, $texture, $fur, $size)
    {
        $variation    = $this->getVariation($breed, $image, $color, $texture, $fur, $size);
        $this->cats[] = new Cat($name, $age, $owner, $variation);
        print("CatDatabase: Added a cat ($name, $breed).\n");
    }

    /**
     * @param string $breed
     * @param string $image
     * @param string $color
     * @param string $texture
     * @param string $fur
     * @param string $size
     * @return CatVariation
     */
    public function getVariation($breed, $image, $color, $texture, $fur, $size): CatVariation
    {
        $key = $this->getKey(get_defined_vars());

        if (!isset($this->variations[$key])) {
            $this->variations[$key] = new CatVariation($breed, $image, $color, $texture, $fur, $size);
        }

        return $this->variations[$key];
    }

    /**
     * @param array $data
     * @return string
     */
    private function getKey(array $data): string
    {
        return md5(implode("_", $data));
    }

    /**
     * @param array $query
     * @return \DesignPatterns\Structural\Flyweight\Cat
     */
    public function findCat(array $query): ?Cat
    {
        foreach ($this->cats as $cat) {
            if ($cat->matches($query)) {
                return $cat;
            }
        }
        print("CatDatabase: Sorry, your query does not yield any results.");
        return null;
    }

}
