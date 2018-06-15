<?php

$app->get('/', 'app.controller:home')->setName('home');

$app->get('/months', 'app.controller:months')->setName('months');
$app->get('/months/{year}/{month}', 'app.controller:oneMonth')->setName('oneMonth');

$app->get('/years', 'app.controller:years')->setName('years');
$app->get('/years/{year}', 'app.controller:oneYear')->setName('oneYear');

$app->get('/import', 'import.controller:import')->setName('import');

$app->map(['GET', 'POST'], '/newReservation', 'app.controller:newReservation')->setName('newReservation');
