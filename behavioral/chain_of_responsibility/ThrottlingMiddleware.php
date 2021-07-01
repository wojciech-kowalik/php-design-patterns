<?php

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

use DesignPatterns\Behavioral\ChainOfResponsibility\Middleware;

/**
 * The Concrete Middleware class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\ChainOfResponsibility
 */
class ThrottlingMiddleware extends Middleware
{
    private $requestPerMinute;
    private $request;
    private $currentTime;

    public function __construct(int $requestPerMinute)
    {
        $this->requestPerMinute = $requestPerMinute;
        $this->currentTime      = time();
    }

    /**
     * @inheritDoc
     */
    public function check(string $email, string $password): bool
    {
        if (time() > $this->currentTime + 60) {
            $this->request     = 0;
            $this->currentTime = time();
        }

        $this->request++;

        if ($this->request > $this->requestPerMinute) {
            print("ThrottlingMiddleware: Request limit exceeded!\n");
            die();
        }

        return parent::check($email, $password);
    }
}
