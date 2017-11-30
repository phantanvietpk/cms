<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title', 'name', 'group_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(UserPermissionGroup::class, 'group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userGroups()
    {
        return $this->belongsToMany(
            UserGroup::class,
            'user_group_permission',
            'permission_id',
            'group_id'
        );
    }
}
