<?php

namespace Ultraleet\VerifyOnce\Data;

use Ultraleet\VerifyOnce\Exceptions\UndefinedFieldException;

abstract class AbstractData
{
    public function __construct($data = [])
    {
        foreach ((array) $data as $key => $value) {
            $this->__set($key, $value);
        }
    }

    public function __get(string $name)
    {
        $getter = 'get' . ucfirst($name);
        if (method_exists($this, $getter)) {
            return $this->$getter();
        }
        if (! property_exists($this, $name)) {
            $class = static::class;
            throw new UndefinedFieldException("Class '$class' doesn't have a field called '$name'.");
        }
        return $this->$name;
    }

    public function __set(string $name, $value)
    {
        $setter = 'set' . ucfirst($name);
        if (method_exists($this, $setter)) {
            $this->$setter($value);
            return;
        }
        if (! property_exists($this, $name)) {
            $class = static::class;
            throw new UndefinedFieldException("Class '$class' doesn't have a field called '$name'.");
        }
        $this->$name = $value;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
