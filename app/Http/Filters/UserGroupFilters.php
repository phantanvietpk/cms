<?php

namespace App\Http\Filters;

class UserGroupFilters extends Filters
{
    protected $orderable = [
        'id', 'title', 'users_count', 'created_at'
    ];
    protected $searchable = [
        'title',
    ];
}