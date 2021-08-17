<?php

namespace Rules\Predicates\Primitives;

use Rules\Interfaces\PredicateInterface;

abstract class Primitive implements PredicateInterface
{
    /**
     * Context variable name
     *
     * @var string
     */
    protected $variableName;
}
