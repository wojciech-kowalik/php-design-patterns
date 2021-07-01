<?php

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    require (__DIR__ . "/" . array_pop($path) . ".php");
});

use DesignPatterns\Creational\FactoryMethod\SedanFactory;

class Main
{
    public function run()
    {
        $factory = new SedanFactory();
        $car     = $factory->makeCar();
        echo $car->getType() . PHP_EOL;
    }
}

(new Main())->run();
