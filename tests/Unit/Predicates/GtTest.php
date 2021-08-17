<?php

namespace tests\Unit\Predicates;

use PHPUnit\Framework\TestCase;
use Rules\Contexts\ArrayContext;
use Rules\Exceptions\ContextVariableUndefinedException;
use Rules\Predicates\Primitives\Gt;

class GtTest extends TestCase
{
    public function test()
    {
        $predicate = new Gt('a', 1);

        $context = new ArrayContext(['a' => 2]);

        $this->assertTrue($predicate->evaluate($context));

        $this->expectException(ContextVariableUndefinedException::class);
        $wrongContext = new ArrayContext(['z' => 2]);
        $predicate->evaluate($wrongContext);
    }
}
