# Business rules manager

## installation

`compose require antonforwork/rules`

## usage

#### Create rules with predicates

```php
$rule1 = new \Rules\Rule(['id'=>1, 'name'=>'cart discount', '...etc']);
$rule1->withPredicate(new \Rules\Predicates\Primitives\Gte('total_amount', 4500));

$rule2 = new \Rules\Rule(['id'=>2, 'name'=>'country based promo', '...etc']);
$rule2->withPredicate(new \Rules\Predicates\Primitives\Equals('country','US'));

// build context
$context = new \Rules\Contexts\ArrayContext([
    'country'=> 'US',
    'total_amount'=> 3000,
]);

$manager = new \Rules\Manager();
$manager
    ->addRule($rule1)
    ->addRule($rule2)
    // ...
    ;
    
$matchedRules = $manager->inspect($context); // will return only 1 item. Rule #2, country based promo 

```

### Primitive predicates

---

#### Equals

```php
(new \Rules\Predicates\Primitives\Equals('a', 1));
// Context: a=>1 - true, a=>'1' - true, 'a'=>2 - false
```

---

#### EqualsStrict

```php
(new \Rules\Predicates\Primitives\EqualsStrict('a', 1));
// Context: a=>1 - true, a=>'1' - false, 'a'=>2 - false
```

---

#### Gt

```php
(new \Rules\Predicates\Primitives\Gt('a', 1));
// Context: a=>0 - false, a=>1 - false, a=>2 - true
```

---

#### Gte

```php
(new \Rules\Predicates\Primitives\Gte('a', 1));
// Context: a=>0 - false, a=>1 - true, a=>2 - true
```

---

#### Lt

```php
(new \Rules\Predicates\Primitives\Lt('a', 1));
// Context: a=>0 - true, a=>1 - false, a=>2 - false
```

---

#### Lte

```php
(new \Rules\Predicates\Primitives\Lte('a', 1));
// Context: a=>0 - true, a=>1 - true, a=>2 - false
```

---

#### InRange

```php
(new \Rules\Predicates\Primitives\InRange('a', 1, 10));
// Context: a=>1 - true, a=>10 - true, a=>20 - false
```

## Logical predicates

---

#### LogicalAnd

```php
new \Rules\Predicates\Logical\LogicalAnd(
    (new \Rules\Predicates\Primitives\Equals('a', 1))
    (new \Rules\Predicates\Primitives\Equals('b', 2))
    //...
);
// Context:
//  [a=>1, b=>2] - true
//  [a=>1, b=>3] - false
//  [a=>0, b=>2] - false
```

#### LogicalOr

```php
new \Rules\Predicates\Logical\LogicalOr(
    (new \Rules\Predicates\Primitives\Equals('a', 1))
    (new \Rules\Predicates\Primitives\Equals('b', 2))
    //...
);
// Context:
//  [a=>1, b=>2] - true
//  [a=>1, b=>3] - true
//  [a=>0, b=>2] - true
//  [a=>0, b=>3] - false
```

#### LogicalNot

```php
new \Rules\Predicates\Logical\LogicalNot(
    new \Rules\Predicates\Logical\LogicalOr(
        (new \Rules\Predicates\Primitives\Equals('a', 1))
        (new \Rules\Predicates\Primitives\Equals('b', 2))
        //...
    )
);
// Context:
//  [a=>1, b=>2] - false
//  [a=>1, b=>3] - false
//  [a=>0, b=>2] - false
//  [a=>0, b=>3] - true
```