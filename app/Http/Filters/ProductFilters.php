<?php

namespace App\Http\Filters;

class ProductFilters extends Filters
{
    protected $orderable = [
        'name', 'status', 'created_at',
    ];
    protected $searchable = [
        'name',
    ];
}