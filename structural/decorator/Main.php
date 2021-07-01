<?php

use DesignPatterns\Structural\Decorator\DangerousHTMLTagsFilter;
use DesignPatterns\Structural\Decorator\PlainTextFilter;
use DesignPatterns\Structural\Decorator\TextInput;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {

        $comment = <<<HERE
Hello! Nice blog post!
Please visit my <a href='http://www.iwillhackyou.com'>homepage</a>.
<script src="http://www.iwillhackyou.com/script.js">
    performXSSAttack();
</script>
HERE;

        $textInput = new TextInput();
        print($textInput->formatText($comment));

        print("\n\nFiltered plain text\n\n");
        $plainTextFiltered = new PlainTextFilter($textInput);
        print($plainTextFiltered->formatText($comment));

        print("\n\nFiltered dangerous text\n\n");
        $dangerousTextFiltered = new DangerousHTMLTagsFilter($textInput);
        print($dangerousTextFiltered->formatText($comment));
    }
}

(new Main())->run();
