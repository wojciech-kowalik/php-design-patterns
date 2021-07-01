<?php

namespace DesignPatterns\Behavioral\Mediator;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Mediator
 */
class User
{
    public $attributes = [];

    /**
     * @param [type] $data
     * @return void
     */
    public function update($data)
    {
        $this->attributes = array_merge($this->attributes, $data);
    }

    /**
     * @return void
     */
    public function delete()
    {
        print("User: I can now delete myself without worrying about the repository.\n");
        events()->trigger("users:deleted", $this, $this);
    }
}
