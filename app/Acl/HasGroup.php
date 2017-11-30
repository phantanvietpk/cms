<?php

namespace App\Acl;

use App\UserGroup;

trait HasGroup
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id');
    }

    /**
     * @param \App\UserGroup $userGroup
     */
    public function assignToGroup(UserGroup $userGroup)
    {
        $this->user_group_id = $userGroup->id;
        $this->save();
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function hasPermission($name)
    {
        if (is_string($name)) {
            if ($permissions = optional($this->group)->permissions) {
                return $permissions->filter(function ($permission) use ($name) {
                    return $permission->name === $name;
                })->isNotEmpty();
            }
        }

        return false;
    }
}
