<?php

namespace Rules\Predicates\Types;

use Rules\Interfaces\PredicateInterface;

abstract class Type implements PredicateInterface
{
    /**
     * @var string
     */
    protected $variableName;

    /**
     * Type constructor.
     *
     * @param string $variableName
     */
    public function __construct(string $variableName)
    {
        $this->variableName = $variableName;
    }
}
