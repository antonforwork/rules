<?php

namespace Rules;

use Rules\Interfaces\ContextInterface;

class Manager
{
    /**
     * Rules
     *
     * @var array<Rule>
     */
    protected $rules = [];

    /**
     * Add rule to manager
     *
     * @param Rule $rule
     *
     * @return $this
     */
    public function addRule(Rule $rule): Manager
    {
        $this->rules[] = $rule;
        return $this;
    }

    /**
     * Reset rules
     *
     * @return $this
     */
    public function flushRules()
    {
        $this->rules = [];
        return $this;
    }

    /**
     * Run rules on context
     *
     * @param ContextInterface $context
     *
     * @return array<Rule>
     */
    public function inspect(ContextInterface $context): array
    {
        return array_values(array_filter($this->rules, static function (Rule $rule) use ($context) {
            return $rule->evaluate($context);
        }));
    }
}
