<?php

namespace Rules\Predicates\Primitives;

use Rules\Interfaces\ContextInterface;

class EqualsStrict extends Equals
{
    public function evaluate(ContextInterface $context): bool
    {
        return $context->get($this->variableName) === $this->value;
    }
}
