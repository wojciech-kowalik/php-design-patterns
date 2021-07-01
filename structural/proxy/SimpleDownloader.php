<?php

namespace DesignPatterns\Structural\Proxy;

use DesignPatterns\Structural\Proxy\IDownloader;

/**
 * The Subject class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Proxy
 */
class SimpleDownloader implements IDownloader
{
    /**
     * @inheritDoc
     */
    public function download(string $url): string
    {
        print("Download data\n");
        $result = file_get_contents($url);
        $count  = strlen($result);

        return "Downloaded bytes: {$count}\n";
    }
}
