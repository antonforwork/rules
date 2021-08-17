<?php

namespace Rules\Predicates\Primitives;

use Rules\Interfaces\ContextInterface;

class Gt extends Primitive
{

    /**
     * Value to compare
     *
     * @var mixed
     */
    protected $value;

    /**
     * Gt constructor.
     *
     * @param string $variableName
     * @param mixed $value
     */
    public function __construct(string $variableName, $value)
    {
        $this->variableName = $variableName;
        $this->value = $value;
    }

    public function evaluate(ContextInterface $context): bool
    {
        return $context->get($this->variableName) > $this->value;
    }
}
