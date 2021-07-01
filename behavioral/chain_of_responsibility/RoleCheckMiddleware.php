<?php

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

use DesignPatterns\Behavioral\ChainOfResponsibility\Middleware;

/**
 * The Concrete Middleware class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\ChainOfResponsibility
 */
class RoleCheckMiddleware extends Middleware
{
    /**
     * @inheritDoc
     */
    public function check(string $email, string $password): bool
    {
        if ("admin@example.com" === $email) {
            print("RoleCheckMiddleware: Hello, admin!\n");

            return true;
        }
        print("RoleCheckMiddleware: Hello, user!\n");

        return parent::check($email, $password);
    }
}
