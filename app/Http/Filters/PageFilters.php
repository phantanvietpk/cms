<?php

namespace App\Http\Filters;

class PageFilters extends Filters
{
    protected $orderable = [
        'name', 'status', 'created_at',
    ];
    protected $searchable = [
        'name',
    ];
}