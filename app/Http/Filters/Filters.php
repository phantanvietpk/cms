<?php

namespace App\Http\Filters;

use Illuminate\Http\Request;

abstract class Filters
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * The Eloquent builder.
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [];

    /**
     * Default order column name.
     * 
     * @var string
     */
    protected $defaultOrderByColumn;

    /**
     * Registered oderable columns.
     *
     * @var array
     */
    protected $orderable = [];

    /**
     * Registered searchable columns.
     *
     * @var array
     */
    protected $searchable = [];

    /**
     * Create a new ThreadFilters instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply the filters.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply($builder)
    {
        $this->builder = $builder;
        
        $this->searchable();

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                call_user_func([$this, $filter], $value);
            }
        }
        
        $this->orderable();

        return $this->builder;
    }

    /**
     * Fetch all relevant filters from the request.
     *
     * @return array
     */
    public function getFilters()
    {
        return array_filter($this->request->only($this->filters));
    }

    /**
     * Searchable filter.
     */
    protected function searchable()
    {
        if ($this->request->filled('q') && count($this->searchable) > 0) {
            $keyword = '%' . $this->request->get('q') . '%';
            $this->builder->where(function ($query) use ($keyword) {
                foreach ($this->searchable as $key => $value) {
                    if (is_array($value)) {
                        $query->orWhereHas($key, function ($query) use ($value, $keyword) {
                            $query->where(function ($query) use ($value, $keyword) {
                                foreach ($value as $subColumn) {
                                    $query->orWhere($subColumn, 'like', $keyword);
                                }
                            });
                        });
                    } else {
                        $query->orWhere($value, 'like', $keyword);
                    }
                }
            });
        }
    }

    /**
     * Order by filter.
     */
    protected function orderable()
    {
        $orderType = $this->request->get('orderType') === 'desc' ? 'desc' : 'asc';
        if (in_array($orderBy = $this->request->get('orderBy'), $this->orderable)) {
            $this->builder->orderBy($orderBy, $orderType);
        } else {
            if ($this->defaultOrderByColumn) {
                $this->builder->orderBy($this->defaultOrderByColumn, $orderType);
            } else {
                $this->builder->latest();
            }
        }
    }
}
