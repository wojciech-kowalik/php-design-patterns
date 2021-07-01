<?php

namespace DesignPatterns\Behavioral\Observer;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Observer
 */
class User
{
    public $attributes = [];

    /**
     * @param array $data
     * @return void
     */
    public function update(array $data)
    {
        $this->attributes = array_merge($this->attributes, $data);
    }
}
