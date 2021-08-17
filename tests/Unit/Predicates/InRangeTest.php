<?php

namespace tests\Unit\Predicates;

use PHPUnit\Framework\TestCase;
use Rules\Contexts\ArrayContext;
use Rules\Predicates\Primitives\InRange;

class InRangeTest extends TestCase
{
    public function test()
    {
        $predicate = new InRange('a', 2, 5);

        $this->assertTrue($predicate->evaluate(new ArrayContext(['a' => 2])));
        $this->assertTrue($predicate->evaluate(new ArrayContext(['a' => 3])));
        $this->assertTrue($predicate->evaluate(new ArrayContext(['a' => 5])));
        $this->assertFalse($predicate->evaluate(new ArrayContext(['a' => 1])));
        $this->assertFalse($predicate->evaluate(new ArrayContext(['a' => 6])));
    }
}
