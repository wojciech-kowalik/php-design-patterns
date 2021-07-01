<?php

use DesignPatterns\Structural\Bridge\HTMLRenderer;
use DesignPatterns\Structural\Bridge\JsonRenderer;
use DesignPatterns\Structural\Bridge\Product;
use DesignPatterns\Structural\Bridge\ProductPage;
use DesignPatterns\Structural\Bridge\SimplePage;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $htmlRenderer = new HTMLRenderer();
        $jsonRenderer = new JsonRenderer();

        $page = new SimplePage($htmlRenderer, "Home", "Welcome to our website!");
        print("HTML view of a simple content page:\n");
        print($page->view());
        print("\n\n");

        $page->changeRenderer($jsonRenderer);
        print("JSON view of a simple content page, rendered with the same client code:\n");
        print($page->view());
        print("\n\n");

        $product = new Product("123", "Star Wars, episode1",
            "A long time ago in a galaxy far, far away...",
            "/images/star-wars.jpeg", 39.95);

        $page = new ProductPage($htmlRenderer, $product);
        print("HTML view of a product page, same client code:\n");
        print($page->view());
        print("\n\n");

        $page->changeRenderer($jsonRenderer);
        print("JSON view of a simple content page, with the same client code:\n");
        print($page->view());

    }
}

(new Main())->run();
