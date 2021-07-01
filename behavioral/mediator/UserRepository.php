<?php

namespace DesignPatterns\Behavioral\Mediator;

use DesignPatterns\Behavioral\Mediator\IObserver;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Behavioral\Mediator
 */
class UserRepository implements IObserver
{
    /**
     * @var array
     */
    private $users = [];

    public function __construct()
    {
        events()->attach($this, "users:deleted");
    }

    /**
     * @param string $event
     * @param $emitter
     * @param [type] $data
     * @return void
     */
    public function update(string $event, $emitter, $data = null)
    {
        switch ($event) {
            case "users:deleted":
                if ($emitter === $this) {
                    return;
                }
                $this->deleteUser($data, true);
                break;
        }
    }

    /**
     * @param string $filename
     * @return void
     */
    public function initialize(string $filename)
    {
        print("UserRepository: Loading user records from a file.\n");
        events()->trigger("users:init", $this, $filename);
    }

    /**
     * @param array $data
     * @param boolean $silent
     * @return void
     */
    public function createUser(array $data, $silent = false)
    {
        print("UserRepository: Creating a user.\n");

        $user = new User();
        $user->update($data);

        $id = bin2hex(openssl_random_pseudo_bytes(16));
        $user->update(["id" => $id]);
        $this->users[$id] = $user;

        if (!$silent) {
            events()->trigger("users:created", $this, $user);
        }

        return $user;
    }

    /**
     * @param User $user
     * @param array $data
     * @param boolean $silent
     * @return void
     */
    public function updateUser(User $user, array $data, $silent = false)
    {
        print("UserRepository: Updating a user.\n");

        $id = $user->attributes["id"];
        if (!isset($this->users[$id])) {
            return null;
        }

        $user = $this->users[$id];
        $user->update($data);

        if (!$silent) {
            events()->trigger("users:updated", $this, $user);
        }

        return $user;
    }

    /**
     * @param User $user
     * @param boolean $silent
     * @return void
     */
    public function deleteUser(User $user, $silent = false)
    {
        print("UserRepository: Deleting a user.\n");

        $id = $user->attributes["id"];
        if (!isset($this->users[$id])) {
            return;
        }

        unset($this->users[$id]);

        if (!$silent) {
            events()->trigger("users:deleted", $this, $user);
        }
    }
}
