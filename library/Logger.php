<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

namespace devtoolboxuk\logging;

/**
 * @method static Firewall logger()
 */
class Logger
{
    protected static $factory;
    protected static $options;
    protected static $dbService;

    protected static $aegisArray = ['log'];

    public static function create()
    {
        $ref = new ReflectionClass(__CLASS__);

        return $ref->newInstance(func_get_args());
    }

    public static function __callStatic($ruleName, $arguments = [])
    {
        $validator = new static();
        return $validator->__call($ruleName, $arguments);
    }

    public static function buildLog($ruleSpec)
    {
        try {
            return static::getFactory()->log($ruleSpec, static::$options);
        } catch (\Exception $exception) {
            throw new \Exception($exception);
        }
    }

    /**
     * @return Factory
     */
    protected static function getFactory()
    {
        if (!static::$factory instanceof Factory) {
            static::$factory = new Factory();
        }

        return static::$factory;
    }

    /**
     * @param Factory $factory
     */
    public static function setFactory($factory)
    {
        static::$factory = $factory;
    }

    public function __call($method, $arguments)
    {
        return static::buildLog($method);
    }

    /**
     * @param $options
     */
    public static function setOptions($options)
    {
        static::$options = $options;
    }

}
