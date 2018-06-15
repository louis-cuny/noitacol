<?php

$controllers = [
    'admin.controller' => 'Admin\Controller\AdminController',
    'data.controller' => 'Admin\Controller\DataController',
    'app.controller'   => 'App\Controller\AppController',
    'auth.controller'  => 'Security\Controller\AuthController',
    'import.controller'  => 'App\Controller\ImportController'
];

foreach ($controllers as $key => $class) {
    $container[$key] = function ($container) use ($class) {
        return new $class($container);
    };
}
