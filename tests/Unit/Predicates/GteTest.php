<?php

namespace tests\Unit\Predicates;

use PHPUnit\Framework\TestCase;
use Rules\Contexts\ArrayContext;
use Rules\Exceptions\ContextVariableUndefinedException;
use Rules\Predicates\Primitives\Gte;

class GteTest extends TestCase
{
    public function test()
    {
        $predicate = new Gte('a', 2);

        $this->assertTrue($predicate->evaluate(new ArrayContext(['a' => 2])));
        $this->assertFalse($predicate->evaluate(new ArrayContext(['a' => 1])));

        $this->expectException(ContextVariableUndefinedException::class);
        $wrongContext = new ArrayContext(['z' => 2]);
        $predicate->evaluate($wrongContext);
    }
}
