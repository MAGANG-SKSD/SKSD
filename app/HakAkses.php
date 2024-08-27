<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model
{

    protected $fillable = ['name'];

    public function roleHakAkses()
    {
        return $this->hasMany(RoleHakAkses::class, 'hak_akses_id');
    }

}