<?php

namespace App;

use App\Http\Filters\HasFilters;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFilters;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'slug', 
        'description',
        'published', 
        'content'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'published_at'
    ];

    protected $casts = [
        'published' => 'boolean'
    ];
}
