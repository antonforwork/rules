<?php

namespace Rules\Predicates\Primitives;

use Rules\Interfaces\ContextInterface;
use Rules\Predicates\Logical\LogicalAnd;

class InRange extends Primitive
{

    /**
     * Value to compare
     *
     * @var mixed
     */
    protected $start;
    /**
     * @var mixed
     */
    protected $end;

    /**
     * Gt constructor.
     *
     * @param string $variableName
     * @param mixed $start
     * @param mixed $end
     */
    public function __construct(string $variableName, $start, $end)
    {
        $this->variableName = $variableName;
        $this->start = $start;
        $this->end = $end;
    }

    public function evaluate(ContextInterface $context): bool
    {
        return (new LogicalAnd(
            new Gte($this->variableName, $this->start),
            new Lte($this->variableName, $this->end)
        ))->evaluate($context);
    }
}
