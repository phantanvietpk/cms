<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermissionGroup extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
        return $this->hasMany(UserPermission::class, 'group_id');
    }
}
