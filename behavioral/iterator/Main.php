<?php

use DesignPatterns\Behavioral\Iterator\WordsCollection;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $collection = new WordsCollection();
        $collection->addItem("First");
        $collection->addItem("Second");
        $collection->addItem("Third");

        foreach ($collection->getIterator() as $item) {
            print("{$item}\n");
        }

        foreach ($collection->getReverseIterator() as $item) {
            print("{$item}\n");
        }

    }

}

(new Main())->run();
