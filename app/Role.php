<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function userRoles()
    {
        return $this->hasMany(UserRole::class, 'role_id');
    }

    public function roleHakAkses()
    {
        return $this->hasMany(RoleHakAkses::class, 'role_id');
    }
}
