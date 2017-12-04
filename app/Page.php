<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'slug', 
        'description', 
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
