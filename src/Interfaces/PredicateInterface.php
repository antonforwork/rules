<?php

namespace Rules\Interfaces;

interface PredicateInterface
{
    /**
     * Run predicate with given context
     *
     * @param ContextInterface $context
     *
     * @return bool
     */
    public function evaluate(ContextInterface $context): bool;
}
