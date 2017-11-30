<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\UserPermission::class, function (Faker $faker) {
    return [
        'title' => $name = $faker->name,
        'name' => str_slug($name),
        'group_id' => create(App\UserPermissionGroup::class)->id
    ];
});
