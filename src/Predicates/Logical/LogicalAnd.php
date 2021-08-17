<?php

namespace Rules\Predicates\Logical;

use Rules\Interfaces\ContextInterface;

class LogicalAnd extends Logical
{
    public function evaluate(ContextInterface $context): bool
    {
        foreach ($this->predicates as $predicate) {
            if (!$predicate->evaluate($context)) {
                return false;
            }
        }
        /*
         * Empty rules return false
         */
        return !empty($this->predicates);
    }
}
