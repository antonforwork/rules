<?php

namespace Rules;

use Rules\Interfaces\ContextInterface;
use Rules\Interfaces\PredicateInterface;

class Rule implements PredicateInterface
{
    /**
     * Some meta info to manage rules
     *
     * @var mixed
     */
    protected $meta = null;

    /**
     * Predicate
     *
     * @var PredicateInterface
     */
    protected $predicate = null;

    /**
     * Rule constructor.
     *
     * @param mixed|null $meta
     */
    public function __construct($meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return mixed
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param mixed $meta
     *
     * @return Rule
     */
    public function withMeta($meta)
    {
        $this->meta = $meta;
        return $this;
    }

    /**
     * Set predicate
     *
     * @param PredicateInterface $predicate
     *
     * @return $this
     */
    public function withPredicate(PredicateInterface $predicate)
    {
        $this->predicate = $predicate;
        return $this;
    }

    public function evaluate(ContextInterface $context): bool
    {
        return $this->predicate->evaluate($context);
    }
}
