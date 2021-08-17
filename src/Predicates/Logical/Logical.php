<?php

namespace Rules\Predicates\Logical;

use Rules\Interfaces\PredicateInterface;

abstract class Logical implements PredicateInterface
{
    /**
     * @var array<PredicateInterface>
     */
    protected $predicates = [];

    public function __construct(PredicateInterface  ...$predicates)
    {
        $this->predicates = $predicates;
    }
}
