<?php
$excludes = [
    'vendor'
];
$finder = PhpCsFixer\Finder::create()
    ->exclude($excludes)
    ->in(__DIR__);

$rules = [
    '@PSR2' => true,
    'array_syntax' => ['syntax' => 'short'],
    'no_multiline_whitespace_before_semicolons' => true,
    'binary_operator_spaces' => [ // [2020-03-26/anton]: added setting to indent key=>values in array
        'align_double_arrow' => true,
        'align_equals'       => false,
    ],
    'no_short_echo_tag' => true,
    'no_unused_imports' => true,
    'not_operator_with_successor_space' => false,
    'no_useless_else' => true,
    'ordered_imports' => true,
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_indent' => true,
    'phpdoc_no_package' => true,
    'phpdoc_order' => true,
    'phpdoc_separation' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_trim' => true,
    'phpdoc_var_without_name' => false, // [2020-03-25/anton]: changed to false because phpstorm cant analyze var without name
    'phpdoc_to_comment' => true,
    'single_quote' => true,
    'ternary_operator_spaces' => true,
    'trailing_comma_in_multiline_array' => true,
    'trim_array_spaces' => true,
];

$config = PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder($finder);

return $config;
