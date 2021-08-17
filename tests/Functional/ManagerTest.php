<?php

namespace tests\Functional;

use PHPUnit\Framework\TestCase;
use Rules\Contexts\ArrayContext;
use Rules\Manager;
use Rules\Predicates\Primitives\Gte;
use Rules\Rule;

class ManagerTest extends TestCase
{
    public function testReadme()
    {
        $rule1 = new \Rules\Rule(['id' => 1, 'name' => 'cart discount', '...etc']);
        $rule1->withPredicate(new \Rules\Predicates\Primitives\Gte('total_amount', 4500));

        $rule2 = new \Rules\Rule(['id' => 1, 'name' => 'country promo', '...etc']);
        $rule2->withPredicate(new \Rules\Predicates\Primitives\Equals('country', 'US'));

        // build context
        $context = new \Rules\Contexts\ArrayContext([
            'country'      => 'US',
            'total_amount' => 3000,
        ]);

        $manager = new \Rules\Manager();
        $manager
            ->addRule($rule1)
            ->addRule($rule2)// ...
;
        $matchedRules = $manager->inspect($context);
    }

    public function testEmptyManager()
    {
        $array = [
            'a' => 1,
            'b' => 2,
        ];

        $context = new ArrayContext($array);

        $manager = new Manager();

        $this->assertEmpty($manager->inspect($context));
    }

    public function testRules()
    {
        $array = [
            'a' => 1,
            'b' => 2,
        ];

        $context = new ArrayContext($array);

        $manager = new Manager();

        $manager->addRule((new Rule('my name is rule 1'))->withPredicate(new Gte('a', 2)));
        $manager->addRule((new Rule('my name is rule 2'))->withPredicate(new Gte('a', 1)));

        $result = $manager->inspect($context);

        $this->assertNotEmpty($result);
        $this->assertCount(1, $result);
        $this->assertEquals('my name is rule 2', $result[0]->getMeta());
    }
}
