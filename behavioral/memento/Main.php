<?php

use DesignPatterns\Behavioral\Memento\Caretaker;
use DesignPatterns\Behavioral\Memento\Originator;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $originator = new Originator("Hello I have got some value");
        $caretaker  = new Caretaker($originator);

        $caretaker->backup();
        $originator->makeJob();

        $caretaker->backup();
        $originator->makeJob();

        $caretaker->backup();
        $originator->makeJob();

        print("\n");
        $caretaker->showHistory();

        print("\nClient: Now, let's rollback!\n\n");
        $caretaker->undo();

        print("\nClient: Once more!\n\n");
        $caretaker->undo();
    }

}

(new Main())->run();
