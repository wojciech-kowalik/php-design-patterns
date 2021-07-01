<?php

namespace DesignPatterns\Behavioral\Command;

use DesignPatterns\Behavioral\Command\ITextFileCommand;
use DesignPatterns\Behavioral\Command\TextFileReceiver;

/**
 * Concrete command class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Command
 */
class WriteTextFileCommand implements ITextFileCommand
{
    private $textFile;
    public $content = "";

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
        return $this->textFile->write($this->getContent());
    }

    /**
     * Get the value of content
     */
    private function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content . "\n";

        return $this;
    }
}
