<?php

use DesignPatterns\Structural\Proxy\CachingDownloaderProxy;
use DesignPatterns\Structural\Proxy\SimpleDownloader;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $subject = new SimpleDownloader();
        $proxy   = new CachingDownloaderProxy($subject);

        print($subject->download("http://wojciech-kowalik.pl"));
        print($proxy->download("http://wojciech-kowalik.pl"));
        print($proxy->download("http://wojciech-kowalik.pl"));
    }

}

(new Main())->run();
