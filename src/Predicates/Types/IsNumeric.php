<?php

namespace Rules\Predicates\Types;

use Rules\Interfaces\ContextInterface;

class IsNumeric extends Type
{
    public function evaluate(ContextInterface $context): bool
    {
        return is_numeric($context->get($this->variableName));
    }
}
