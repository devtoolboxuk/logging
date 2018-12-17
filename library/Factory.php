<?php

namespace devtoolboxuk\logging;

use ReflectionClass;

class Factory
{
    protected $rulePrefixes = [
        'devtoolboxuk\\logging\\Classes\\',
    ];


    public function log($ruleName, $options = [])
    {

        foreach ($this->getRulePrefixes() as $prefix) {

            $className = $prefix . ucfirst($ruleName);
            if (!class_exists($className)) {
                continue;
            }

            $reflection = new ReflectionClass($className);
            return $reflection->newInstance($options);
        }

        throw new \Exception(sprintf('"%s" is not a valid rule name', $ruleName));
    }

    public function getRulePrefixes()
    {
        return $this->rulePrefixes;
    }

}
