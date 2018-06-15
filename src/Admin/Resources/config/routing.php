<?php

$app->group('/admin', function () {
    $this->get('', 'admin.controller:home')
        ->setName('admin.home');
})->add($container['auth.middleware']('admin'));

$app->get('/admin/data/{table}', 'data.controller:data');
