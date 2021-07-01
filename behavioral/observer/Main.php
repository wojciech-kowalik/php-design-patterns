<?php

use DesignPatterns\Behavioral\Observer\Logger;
use DesignPatterns\Behavioral\Observer\OnboardingNotification;
use DesignPatterns\Behavioral\Observer\UserRepository;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $repository = new UserRepository;
        $repository->attach(new Logger(__DIR__ . "/log.txt"), "*");
        $repository->attach(new OnboardingNotification("1@example.com"), "users:created");

        $repository->initialize(__DIR__ . "/users.csv");

        $user = $repository->createUser([
            "name"  => "John Smith",
            "email" => "john99@example.com",
        ]);

        $repository->deleteUser($user);
    }

}

(new Main())->run();
