<?php
//'test/test'     =>  ['home', 'test']
$definedRoutes = [
    'test/get' => ['JsonRoute', 'index'],
    'test/test/{$test}' => ['Routed', 'test']
];
