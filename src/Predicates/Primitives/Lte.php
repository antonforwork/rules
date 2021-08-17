<?php

namespace Rules\Predicates\Primitives;

use Rules\Interfaces\ContextInterface;

class Lte extends Lt
{
    public function evaluate(ContextInterface $context): bool
    {
        return $context->get($this->variableName) <= $this->value;
    }
}
