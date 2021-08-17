<?php

namespace Rules\Predicates\Types;

use Rules\Interfaces\ContextInterface;

class IsString extends Type
{
    public function evaluate(ContextInterface $context): bool
    {
        return is_string($context->get($this->variableName));
    }
}
