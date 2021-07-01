<?php

use DesignPatterns\Structural\Flyweight\DatabaseHelper;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $helper = new DatabaseHelper();

        $helper->loadData("cats.csv");
        $helper->findBy(['name' => "Henry"]);
        $helper->findBy(['name' => "Leon"]);
    }

}

(new Main())->run();
