<?php

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

/**
 * Class which use middleware
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\ChainOfResponsibility
 */
class Server
{
    private $users = [];

    /**
     * @var Middleware
     */
    private $middleware;

    /**
     * @param Middleware $middleware
     * @return void
     */
    public function setMiddleware(Middleware $middleware)
    {
        $this->middleware = $middleware;
    }

    /**
     * @param string $email
     * @param string $password
     * @return void
     */
    public function logIn(string $email, string $password)
    {
        if ($this->middleware->check($email, $password)) {
            print("Server: Authorization has been successful!\n");
            return true;
        }

        return false;
    }

    /**
     * @param string $email
     * @param string $password
     * @return void
     */
    public function register(string $email, string $password)
    {
        $this->users[$email] = $password;
    }

    /**
     * @param string $email
     * @return boolean
     */
    public function hasEmail(string $email): bool
    {
        return isset($this->users[$email]);
    }

    /**
     * @param string $email
     * @param string $password
     * @return boolean
     */
    public function isValidPassword(string $email, string $password): bool
    {
        return $this->users[$email] === $password;
    }
}
