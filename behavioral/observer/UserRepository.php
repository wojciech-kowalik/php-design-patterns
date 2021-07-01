<?php

namespace DesignPatterns\Behavioral\Observer;

use DesignPatterns\Behavioral\Observer\User;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Observer
 */
class UserRepository implements \SplSubject
{
    /**
     * @var array
     */
    private $users = [];

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
    private function initEventGroup(string $event = "*"): void
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    /**
     * @param string $event
     * @return array
     */
    private function getEventObservers(string $event = "*"): array
    {
        $this->initEventGroup($event);
        $group = $this->observers[$event];
        $all   = $this->observers["*"];

        return \array_merge($group, $all);
    }

    /**
     * @inheritDoc
     */
    public function attach(\SplObserver $observer, string $event = "*"): void
    {
        $this->initEventGroup($event);
        $this->observers[$event][] = $observer;
    }

    /**
     * @inheritDoc
     */
    public function detach(\SplObserver $observer, string $event = "*"): void
    {
        foreach ($this->getEventObservers($event) as $key => $eventObserver) {
            if ($eventObserver === $observer) {
                unset($this->observers[$event][$key]);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function notify(string $event = "*", $data = null): void
    {
        print("Broadcasting {$event} event\n");
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($this, $event, $data);
        }
    }

    /**
     * @param string $filename
     * @return void
     */
    public function initialize(string $filename): void
    {
        print("Loading user records from a file\n");
        $this->notify("users:init", $filename);
    }

    /**
     * @param array $data
     * @return User
     */
    public function createUser(array $data): User
    {
        print("Creating a user\n");

        $user = new User;
        $user->update($data);

        $id = bin2hex(openssl_random_pseudo_bytes(16));
        $user->update(["id" => $id]);
        $this->users[$id] = $user;

        $this->notify("users:created", $user);

        return $user;
    }

    /**
     * @param User $user
     * @param array $data
     * @return User
     */
    public function updateUser(User $user, array $data): User
    {
        print("Updating a user\n");

        $id = $user->attributes["id"];
        if (!isset($this->users[$id])) {
            return null;
        }

        $user = $this->users[$id];
        $user->update($data);

        $this->notify("users:updated", $user);

        return $user;
    }

    /**
     * @param User $user
     * @return void
     */
    public function deleteUser(User $user): void
    {
        print("Deleting a user\n");

        $id = $user->attributes["id"];
        if (!isset($this->users[$id])) {
            return;
        }

        unset($this->users[$id]);

        $this->notify("users:deleted", $user);
    }

}
