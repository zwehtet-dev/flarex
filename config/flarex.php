<?php

return [
    'namespace' => 'App',
    'paths' => [
        'models' => 'app/Models',
        'controllers' => 'app/Http/Controllers',
        'resources' => 'app/Http/Resources',
    ],
    'stubs' => [
        'model' => __DIR__.'/../stubs/model.stub',
        'controller' => __DIR__.'/../stubs/controller.stub',
        'api' => __DIR__.'/../stubs/api.stub',
        'resource' => __DIR__.'/../stubs/resource.stub',
        'module' => __DIR__.'/../stubs/module.stub',
    ],
];