<?php

namespace DesignPatterns\Structural\Proxy;

use DesignPatterns\Structural\Proxy\IDownloader;
use DesignPatterns\Structural\Proxy\SimpleDownloader;

/**
 * The Proxy class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Proxy
 */
class CachingDownloaderProxy implements IDownloader
{
    /**
     * @var SimpleDownloader
     */
    private $downloader;

    /**
     * @var string[]
     */
    private $cache = [];

    public function __construct(SimpleDownloader $downloader)
    {
        $this->downloader = $downloader;
    }

    /**
     * @inheritDoc
     */
    public function download(string $url): string
    {
        if (!isset($this->cache[$url])) {
            print("CachingDownloaderProxy MISS. ");
            $result            = $this->downloader->download($url);
            $this->cache[$url] = $result;
        } else {
            print("CachingDownloaderProxy HIT. Retrieving result from cache.\n");
        }
        return $this->cache[$url];
    }
}
