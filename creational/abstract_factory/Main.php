<?php

use DesignPatterns\Creational\AbstractFactory\GUIFactory;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $factory = GUIFactory::getFactory();
        $button  = $factory->createButton();
        echo $button->paint() . PHP_EOL;
    }
}

(new Main())->run();
