<?php

use DesignPatterns\Behavioral\Command\ReadTextFileCommand;
use DesignPatterns\Behavioral\Command\TextFileOperationInvoker;
use DesignPatterns\Behavioral\Command\TextFileReceiver;
use DesignPatterns\Behavioral\Command\WriteTextFileCommand;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $textFile = new TextFileReceiver(__DIR__ . "/file.txt");

        $readTextFileCommand  = new ReadTextFileCommand($textFile);
        $writeTextFileCommand = new WriteTextFileCommand($textFile);

        $textFileOperationInvoker = new TextFileOperationInvoker();
        $writeTextFileCommand->setContent("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus eleifend ex ac gravida.");
        $textFileOperationInvoker->executeOperation($writeTextFileCommand);
        print($textFileOperationInvoker->executeOperation($readTextFileCommand));
    }

}

(new Main())->run();
