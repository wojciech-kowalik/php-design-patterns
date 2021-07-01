<?php

namespace DesignPatterns\Creational\AbstractFactory;

assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_BAIL, 1);

/**
 * Abstract factory
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Creational\AbstractFactory
 */
abstract class GUIFactory
{
    const FACTORY_NAMESPACE = "DesignPatterns\\Creational\\AbstractFactory\\";

    /**
     * @var array
     */
    private static $osFactoryMapping = [
        "Darwin" => "MacosFactory",
        "WINNT"  => "WindowsFactory",
    ];

    /**
     * @return GUIFactory
     */
    public static function getFactory(): GUIFactory
    {
        assert(\in_array(PHP_OS, array_keys(self::$osFactoryMapping)), "OS supported");

        $class = self::FACTORY_NAMESPACE . self::$osFactoryMapping[PHP_OS];
        return new $class();
    }

    /**
     * @return \DesignPatterns\Creational\AbstractFactory\IButton
     */
    abstract public function createButton(): IButton;
}
