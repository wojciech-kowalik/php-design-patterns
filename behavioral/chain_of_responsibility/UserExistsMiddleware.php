<?php

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

use DesignPatterns\Behavioral\ChainOfResponsibility\Middleware;

/**
 * The Concrete Middleware class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\ChainOfResponsibility
 */
class UserExistsMiddleware extends Middleware
{
    private $server;

    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    /**
     * @inheritDoc
     */
    public function check(string $email, string $password): bool
    {
        if (!$this->server->hasEmail($email)) {
            print("UserExistsMiddleware: This email is not registered!\n");

            return false;
        }

        if (!$this->server->isValidPassword($email, $password)) {
            print("UserExistsMiddleware: Wrong password!\n");

            return false;
        }

        return parent::check($email, $password);
    }
}
