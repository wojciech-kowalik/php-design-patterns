<?php

use DesignPatterns\Behavioral\ChainOfResponsibility\RoleCheckMiddleware;
use DesignPatterns\Behavioral\ChainOfResponsibility\Server;
use DesignPatterns\Behavioral\ChainOfResponsibility\ThrottlingMiddleware;
use DesignPatterns\Behavioral\ChainOfResponsibility\UserExistsMiddleware;

spl_autoload_register(function ($class) {
    $path = explode('\\', $class);
    include_once (__DIR__ . "/" . array_pop($path) . ".php");
});

class Main
{
    public function run()
    {
        $server = new Server();
        $server->register("admin@example.com", "admin_pass");
        $server->register("user@example.com", "user_pass");

        $middleware = new ThrottlingMiddleware(2);
        $middleware
            ->linkWith(new UserExistsMiddleware($server))
            ->linkWith(new RoleCheckMiddleware());

        $server->setMiddleware($middleware);

        do {
            print("\nEnter your email:\n");
            $email = readline();
            print("Enter your password:\n");
            $password = readline();
            $success  = $server->logIn($email, $password);
        } while (!$success);
    }

}

(new Main())->run();
