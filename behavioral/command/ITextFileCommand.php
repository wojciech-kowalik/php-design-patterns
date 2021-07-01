<?php

namespace DesignPatterns\Behavioral\Command;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Command
 */
interface ITextFileCommand
{
    /**
     * @return string
     */
    public function execute();
}
