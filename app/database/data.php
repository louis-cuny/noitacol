<?php

use \Illuminate\Database\Capsule\Manager as DB;
use Security\Model\User;
use \App\Model\Location;
use App\Model\Intermediate;

User::insert(
    [
        'id' => 1,
        'username' => 'LouisCuny',
        'email' => 'louis-cuny@orange.fr',
        'password' => '$2y$10$llwM.5ZXAvq9ywWbrva2g.SUDDrXBr3h3EOT0UvN/qTmCpoemDrk.',
        'permissions' => '{"user.delete":0}',
        'last_login' => '2017-12-12 17:17:17'
    ]
);

DB::table('activations')->insert([
    [
        'id' => 1,
        'user_id' => 1,
        'code' => 'ui3IVw5A5iRLGOsXyYk7FbapSBidUXhj',
        'completed' => 1,
        'completed_at' => '2017-11-23 11:31:50'
    ]
]);

DB::table('role_users')->insert([
    [
        'user_id' => 1,
        'role_id' => 2
    ]
]);

Location::insert(
    [
        'id' => 1,
        'user_id' => 1,
        'name' => 'Chalet Rose',
        'address' => '21 rue du stade 88600 Brouvelieures'
    ]
);

Intermediate::insert(
    [
        'id' => 1,
        'name' => 'AirBnb',
        'fee' => '3.0'
    ],
    [
        'id' => 2,
        'name' => 'None',
        'fee' => '0'
    ]
);
