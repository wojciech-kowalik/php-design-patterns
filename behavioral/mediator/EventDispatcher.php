<?php

namespace DesignPatterns\Behavioral\Mediator;

use DesignPatterns\Behavioral\Mediator\IObserver;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Mediator
 */
class EventDispatcher
{
    /**
     * @var array
     */
    private $observers = [];

    public function __construct()
    {
        $this->observers["*"] = [];
    }

    /**
     * @param string $event
     * @return void
     */
    private function initEventGroup(string &$event = "*")
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    /**
     * @param string $event
     * @return void
     */
    private function getEventObservers(string $event = "*")
    {
        $this->initEventGroup($event);
        $group = $this->observers[$event];
        $all   = $this->observers["*"];

        return array_merge($group, $all);
    }

    /**
     * @param Observer $observer
     * @param string $event
     * @return void
     */
    public function attach(IObserver $observer, string $event = "*")
    {
        $this->initEventGroup($event);

        $this->observers[$event][] = $observer;
    }

    /**
     * @param Observer $observer
     * @param string $event
     * @return void
     */
    public function detach(IObserver $observer, string $event = "*")
    {
        foreach ($this->getEventObservers($event) as $key => $s) {
            if ($s === $observer) {
                unset($this->observers[$event][$key]);
            }
        }
    }

    /**
     * @param string $event
     * @param $emitter
     * @param [type] $data
     * @return void
     */
    public function trigger(string $event, $emitter, $data = null)
    {
        print("EventDispatcher: Broadcasting the '$event' event.\n");
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($event, $emitter, $data);
        }
    }
}
