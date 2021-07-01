<?php

namespace DesignPatterns\Behavioral\Command;

/**
 * The Receiver class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Command
 */
class TextFileReceiver
{
    private $name;
    private $handler;

    public function __construct(string $name)
    {
        $this->name    = $name;
        $this->handler = fopen($name, "a+b");
    }

    /**
     * @return void
     */
    public function __destruct()
    {
        fclose($this->handler);
        print("File {$this->name} has been closed\n");
    }

    /**
     * @return string
     */
    public function read(): string
    {
        print("Reading file {$this->name}\n");
        $content = "";
        $size    = filesize($this->name);

        if ($size > 0) {
            $content = file_get_contents($this->name);
        }

        return "{$content}\n";
    }

    /**
     * @param string $content
     * @return bool
     */
    public function write(string $content)
    {
        print("Writing to file {$this->name}\n");
        return fwrite($this->handler, $content);

    }

}
