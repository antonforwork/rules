<?php

namespace tests\Unit\Predicates;

use PHPUnit\Framework\TestCase;
use Rules\Contexts\ArrayContext;
use Rules\Predicates\Logical\LogicalAnd;
use Rules\Predicates\Primitives\Gte;

class LogicalAndTest extends TestCase
{
    public function test()
    {
        $predicate = new LogicalAnd(
            new Gte('a', 2),
            new Gte('b', 2)
        );

        $this->assertTrue($predicate->evaluate(new ArrayContext(['a' => 5, 'b' => 5])));
        $this->assertTrue($predicate->evaluate(new ArrayContext(['a' => 2, 'b' => 2])));
        $this->assertFalse($predicate->evaluate(new ArrayContext(['a' => 1, 'b' => 3])));
        $this->assertFalse($predicate->evaluate(new ArrayContext(['a' => 3, 'b' => 1])));
        $this->assertFalse($predicate->evaluate(new ArrayContext(['a' => 1, 'b' => 1])));
    }
}
