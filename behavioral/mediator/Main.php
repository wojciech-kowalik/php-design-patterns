<?php

use DesignPatterns\Behavioral\Mediator\EventDispatcher;
use DesignPatterns\Behavioral\Mediator\Logger;
use DesignPatterns\Behavioral\Mediator\OnboardingNotification;
use DesignPatterns\Behavioral\Mediator\UserRepository;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

function events(): EventDispatcher
{
    static $eventDispatcher;

    if (!$eventDispatcher) {
        $eventDispatcher = new EventDispatcher();
    }

    return $eventDispatcher;
}

class Main
{
    public function run()
    {
        $repository = new UserRepository();
        events()->attach($repository, "facebook:update");

        $logger = new Logger(__DIR__ . "/log.txt");
        events()->attach($logger, "*");

        $onboarding = new OnboardingNotification("test1@test.pl");
        events()->attach($onboarding, "users:created");

        $repository->initialize(__DIR__ . "users.csv");

        $user = $repository->createUser([
            "name"  => "John Smith",
            "email" => "test2@test.pl",
        ]);

        $user->delete();
    }

}

(new Main())->run();
