<?php

namespace DesignPatterns\Behavioral\Mediator;

use DesignPatterns\Behavioral\Mediator\IObserver;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Mediator
 */
class OnboardingNotification implements IObserver
{
    /**
     * @var string
     */
    private $adminEmail;

    /**
     * @param string $adminEmail
     */
    public function __construct(string $adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    /**
     * @inheritDoc
     */
    public function update(string $event, $emitter, $data = null)
    {
        print("OnboardingNotification: The notification has been emailed!\n");
    }
}
