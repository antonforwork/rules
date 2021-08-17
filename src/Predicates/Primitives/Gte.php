<?php

namespace Rules\Predicates\Primitives;

use Rules\Interfaces\ContextInterface;

class Gte extends Gt
{
    public function evaluate(ContextInterface $context): bool
    {
        return $context->get($this->variableName) >= $this->value;
    }
}
