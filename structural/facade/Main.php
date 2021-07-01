<?php

use DesignPatterns\Structural\Facade\ComputerFacade;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $facade = new ComputerFacade();
        $facade->run();
    }
}

(new Main())->run();
