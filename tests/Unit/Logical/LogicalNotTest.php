<?php

namespace tests\Unit\Predicates;

use PHPUnit\Framework\TestCase;
use Rules\Contexts\ArrayContext;
use Rules\Predicates\Logical\LogicalNot;
use Rules\Predicates\Logical\LogicalOr;
use Rules\Predicates\Primitives\Gte;

class LogicalNotTest extends TestCase
{
    public function test()
    {
        $predicate = new LogicalNot(new LogicalOr(
            new Gte('a', 2),
            new Gte('b', 2)
        ));

        $this->assertFalse($predicate->evaluate(new ArrayContext(['a' => 5, 'b' => 5])));
        $this->assertFalse($predicate->evaluate(new ArrayContext(['a' => 2, 'b' => 2])));
        $this->assertFalse($predicate->evaluate(new ArrayContext(['a' => 1, 'b' => 3])));
        $this->assertFalse($predicate->evaluate(new ArrayContext(['a' => 3, 'b' => 1])));

        $this->assertTrue($predicate->evaluate(new ArrayContext(['a' => 1, 'b' => 1])));
    }
}
