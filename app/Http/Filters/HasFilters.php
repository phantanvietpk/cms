<?php

namespace App\Http\Filters;

/**
 * Trait HasFilters
 *
 * @method \Illuminate\Database\Eloquent\Builder filters(Filters $filters)
 */
trait HasFilters
{
    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \App\Http\Filters\Filters $filters
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilters($query, Filters $filters)
    {
        return $filters->apply($query);
    }
}
