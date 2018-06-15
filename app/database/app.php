<?php

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;

Manager::schema()->create('traveller', function (Blueprint $table) {
    $table->increments('id');
    $table->string('username');
    $table->string('country')->nullable();
    $table->string('city')->nullable();
    $table->timestamps();
});

Manager::schema()->create('location', function (Blueprint $table) {
    $table->increments('id');
    $table->unsignedInteger('user_id');
    $table->string('name')->unique();
    $table->string('address')->nullable();
    $table->timestamps();
    $table->foreign('user_id')->references('id')->on('user');
});

Manager::schema()->create('intermediate', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name')->unique();
    $table->string('fee')->nullable();
    $table->timestamps();
});

Manager::schema()->create('reservation', function (Blueprint $table) {
    $table->increments('id');
    $table->date('start');
    $table->date('end');
    $table->date('collection')->nullable();
    $table->float('amount');
    $table->integer('nb_traveller');
    $table->unsignedInteger('traveller_id');
    $table->unsignedInteger('location_id');
    $table->unsignedInteger('intermediate_id');
    $table->timestamps();
    $table->foreign('traveller_id')->references('id')->on('traveller');
    $table->foreign('location_id')->references('id')->on('location');
    $table->foreign('intermediate_id')->references('id')->on('intermediate');
});
