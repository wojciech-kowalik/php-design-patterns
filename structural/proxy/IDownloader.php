<?php

namespace DesignPatterns\Structural\Proxy;

/**
 * The Subject interface
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Proxy
 */
interface IDownloader
{
    /**
     * @param string $url
     * @return string
     */
    public function download(string $url): string;
}
