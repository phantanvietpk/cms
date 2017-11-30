<?php

namespace App;

use App\Http\Filters\HasFilters;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFilters;

    protected $fillable = [
        'title'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(
            UserPermission::class,
            'user_group_permission',
            'group_id',
            'permission_id'
        );
    }

    /**
     * @param \App\UserPermission $permission
     */
    public function assignPermission(UserPermission $permission)
    {
        $this->permissions()->save($permission);
    }

    /**
     * @param \App\UserPermission[] $permissions
     */
    public function assignPermissions(array $permissions)
    {
        $this->permissions()->saveMany($permissions);
    }
}
