<?php

use DesignPatterns\Creational\Prototype\PHPBookPrototype;
use DesignPatterns\Creational\Prototype\SQLBookPrototype;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $phpBookPrototype = new PHPBookPrototype();
        $sqlBookPrototype = new SQLBookPrototype();

        $bookBasedOnPhp = clone $phpBookPrototype;
        $bookBasedOnSql = clone $sqlBookPrototype;

        $bookBasedOnPhp->setTitle('OReilly Learning PHP');
        $bookBasedOnSql->setTitle('OReilly Learning SQL');

        echo $bookBasedOnPhp;
        echo $bookBasedOnSql;

    }
}

(new Main())->run();
