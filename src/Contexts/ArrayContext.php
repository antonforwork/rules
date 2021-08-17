<?php

namespace Rules\Contexts;

use Rules\Exceptions\ContextVariableUndefinedException;
use Rules\Interfaces\ContextInterface;

class ArrayContext implements ContextInterface
{

    /**
     * Context values. Key=>Value
     *
     * @var array<mixed>
     */
    protected $contextValues = [];

    /**
     * ArrayContext constructor.
     *
     * @param array<mixed> $contextValues
     */
    public function __construct(array $contextValues)
    {
        $this->contextValues = $contextValues;
    }


    /**
     * Get value from context by name
     *
     * @param string $contextVariableName
     *
     * @throws ContextVariableUndefinedException
     *
     * @return mixed
     */
    public function get(string $contextVariableName)
    {
        if (!isset($this->contextValues[$contextVariableName])) {
            throw new ContextVariableUndefinedException(\sprintf('%s variable undefined', $contextVariableName));
        }
        return $this->contextValues[$contextVariableName];
    }
}
