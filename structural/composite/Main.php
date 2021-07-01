<?php

use DesignPatterns\Structural\Composite\Fieldset;
use DesignPatterns\Structural\Composite\Form;
use DesignPatterns\Structural\Composite\Input;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $form = new Form("product", "Add product", "product/add");
        $form->add(new Input("name", "Name", "text"));
        $form->add(new Input("description", "Description", "text"));

        $picture = new Fieldset("photo", "Product photo");
        $picture->add(new Input("caption", "Caption", "text"));
        $picture->add(new Input("image", "Image", "file"));

        $form->add($picture);

        $data = [
            'name'        => 'Apple MacBook',
            'description' => 'A decent laptop.',
            'photo'       => [
                'caption' => 'Front photo.',
                'image'   => 'photo1.png',
            ],
        ];

        $form->setData($data);

        print($form->render());

    }
}

(new Main())->run();
