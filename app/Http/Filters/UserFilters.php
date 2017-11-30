<?php

namespace App\Http\Filters;

class UserFilters extends Filters
{
    protected $orderable = [
        'id', 'name', 'email', 'username', 'is_activated', 'user_group_id',
    ];
    protected $searchable = [
        'name', 'email', 'username',
    ];
}