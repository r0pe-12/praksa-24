<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{

    protected $fillable = [
        'id',
        'name'
    ];

    /**
     * Get all users of specified role
     * @return HasMany
     */
    public function users(): HasMany
    {
        # code
        return $this->hasMany(User::class);
    }

    const SUPERADMIN = 1;

    public static function superadmin()
    {
        # code
        $role = Role::findOrNew(Role::SUPERADMIN);
        if(!$role->id) {
            $role->id = Role::SUPERADMIN;
            $role->name = 'SuperAdmin';
            $role->save();
        }
        return $role;
    }

    const GUEST = 4;

    public static function guest()
    {
        # code
        $role = Role::findOrNew(Role::GUEST);
        if (!$role->id) {
            $role->id = Role::GUEST;
            $role->name = 'Guest';
            $role->save();
        }
        return $role;
    }
}
