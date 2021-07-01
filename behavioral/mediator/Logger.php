<?php

namespace DesignPatterns\Behavioral\Mediator;

use DesignPatterns\Behavioral\Mediator\IObserver;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Mediator
 */
class Logger implements IObserver
{
    /**
     * @var string
     */
    private $filename;

    /**
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $this->filename = $filename;
        if (file_exists($this->filename)) {
            unlink($this->filename);
        }
    }

    /**
     * @inheritDoc
     */
    public function update(string $event, $emitter, $data = null)
    {
        $entry = date("Y-m-d H:i:s") . ": '$event' with data '" . json_encode($data) . "'\n";
        file_put_contents($this->filename, $entry, FILE_APPEND);

        print("Logger: I've written '$event' entry to the log.\n");
    }
}
