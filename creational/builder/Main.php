<?php

use DesignPatterns\Creational\Builder\Cook;
use DesignPatterns\Creational\Builder\HawaiianPizzaBuilder;
use DesignPatterns\Creational\Builder\MargheritaPizzaBuilder;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $cook = new Cook();

        $cook->setPizzaBuilder(new MargheritaPizzaBuilder());
        $cook->prepare();
        echo $cook->getPizza();

        $cook->setPizzaBuilder(new HawaiianPizzaBuilder());
        $cook->prepare();
        echo $cook->getPizza();
    }
}

(new Main())->run();
