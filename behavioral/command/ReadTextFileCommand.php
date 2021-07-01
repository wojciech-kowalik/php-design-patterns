<?php

namespace DesignPatterns\Behavioral\Command;

use DesignPatterns\Behavioral\Command\ITextFileCommand;
use DesignPatterns\Behavioral\Command\TextFileReceiver;

/**
 * Concrete command class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Command
 */
class ReadTextFileCommand implements ITextFileCommand
{
    private $textFile;

    /**
     * @param \DesignPatterns\Behavioral\Command\TextFileReceiver $textFile
     */
    public function __construct(TextFileReceiver $textFile)
    {
        $this->textFile = $textFile;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        return $this->textFile->read();
    }

}
