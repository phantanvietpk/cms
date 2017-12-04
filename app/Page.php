<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'thumbnail',
        'published',
        'published_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'published_at'
    ];

    protected $casts = [
        'published' => 'boolean'
    ];

    public function languages()
    {
        return $this->hasMany(PageLanguage::class);
    }

    /**
     * @param $value
     * @return string
     */
    public function getNameOnLogsAttribute($value)
    {
        return $this->language('name') ?: 'page';
    }

    /**
     * @param $value
     * @return string
     */
    public function getUrlOnLogsAttribute($value)
    {
        return admin_route('page.index');
    }
}
