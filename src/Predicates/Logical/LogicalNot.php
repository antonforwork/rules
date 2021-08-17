<?php

namespace Rules\Predicates\Logical;

use Rules\Interfaces\ContextInterface;
use Rules\Interfaces\PredicateInterface;

class LogicalNot implements PredicateInterface
{
    /**
     * @var PredicateInterface
     */
    protected $predicate;

    public function __construct(PredicateInterface $predicate)
    {
        $this->predicate = $predicate;
    }

    public function evaluate(ContextInterface $context): bool
    {
        return !$this->predicate->evaluate($context);
    }
}
