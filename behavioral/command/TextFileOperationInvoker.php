<?php

namespace DesignPatterns\Behavioral\Command;

use DesignPatterns\Behavioral\Command\ITextFileCommand;

/**
 * The Invoker class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Command
 */
class TextFileOperationInvoker
{
    /**
     * @param \DesignPatterns\Behavioral\Command\ITextFileCommand $textFileCommand
     */
    public function executeOperation(ITextFileCommand $textFileCommand)
    {
        return $textFileCommand->execute();
    }
}
