<?php

namespace Rules\Interfaces;

interface ContextInterface
{
    /**
     * Should return some value from context
     *
     * @param string $contextVariableName
     *
     * @return mixed
     */
    public function get(string $contextVariableName);
}
