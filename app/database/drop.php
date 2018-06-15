<?php

use Illuminate\Database\Capsule\Manager;

$tables = [
    'reservation',
    'location',
    'traveller',
    'intermediate',

    'activations',
    'persistences',
    'reminders',
    'role_users',
    'throttle',
    'roles',
    'user'
];

Manager::schema()->disableForeignKeyConstraints();
foreach ($tables as $table) {
    Manager::schema()->dropIfExists($table);
}
