<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = 'usuarios';
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'usuarios_roles' ,'usuarios_id', 'roles_id');
    }
}
