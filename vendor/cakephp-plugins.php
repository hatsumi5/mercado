<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Cake/TwigView' => $baseDir . '/vendor/cakephp/twig-view/',
        'Cors' => $baseDir . '/vendor/ozee31/cakephp-cors/',
        'Crud' => $baseDir . '/vendor/friendsofcake/crud/',
        'CrudJsonApi' => $baseDir . '/vendor/friendsofcake/crud-json-api/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/'
    ]
];