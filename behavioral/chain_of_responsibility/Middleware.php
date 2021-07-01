<?php

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

/**
 * The Context class, external state (extrinsic state)
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\ChainOfResponsibility
 */
abstract class Middleware
{
    /**
     * @var Middleware
     */
    private $next;

    /**
     * Builds chain of middleware objects
     *
     * @param Middleware $next
     * @return Middleware
     */
    public function linkWith(Middleware $next): Middleware
    {
        $this->next = $next;
        return $next;
    }

    /**
     * @param string $email
     * @param string $password
     * @return boolean
     */
    public function check(string $email, string $password): bool
    {
        if (!$this->next) {
            return true;
        }

        return $this->next->check($email, $password);
    }

}
