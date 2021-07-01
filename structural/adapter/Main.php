<?php

use DesignPatterns\Structural\Adapter\PDFRenderAdapter;
use DesignPatterns\Structural\Adapter\RenderHTMLTemplate;
use DesignPatterns\Structural\Adapter\RenderPDFTemplate;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $htmlTemplate       = new RenderHTMLTemplate();
        $pdfTemplate        = new RenderPDFTemplate();
        $pdfTemplateAdapter = new PDFRenderAdapter($pdfTemplate);

        echo $htmlTemplate;
        echo $pdfTemplateAdapter;
    }
}

(new Main())->run();
