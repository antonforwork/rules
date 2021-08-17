<?php

namespace Rules\Predicates\Logical;

use Rules\Interfaces\ContextInterface;

class LogicalOr extends Logical
{
    public function evaluate(ContextInterface $context): bool
    {
        foreach ($this->predicates as $predicate) {
            if ($predicate->evaluate($context)) {
                return true;
            }
        }
        return false;
    }
}
