<?php

namespace App;

use App\Acl\HasGroup;
use App\Http\Filters\HasFilters;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable, HasGroup, HasFilters;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'photo_path', 'is_activated', 'is_super_admin', 'user_group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_activated' => 'boolean',
        'is_super_admin' => 'boolean',
    ];

    /**
     * @return bool
     */
    public function isSuperAdmin(): bool
    {
        return $this->getAttribute('is_super_admin');
    }

    /**
     * @return bool
     */
    public function isActivated(): bool
    {
        return $this->getAttribute('is_activated');
    }

    /**
     * @return string
     */
    public function avatar()
    {
        return $this->photo_path ?
            Storage::disk('public')->url($this->photo_path) :
            asset('assets/images/avatar-default.png');
    }
}
