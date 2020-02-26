<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    // protected $guard = 'admin';
    //
    protected $table = 'admins';

    // an admin belongsto a role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getAvatarAttribute($value)
    {
        $value = url('web/images/') . "/$value";
        return $value;
    }

    public function loginAdmin()
    {
        $admin = auth('admin')->user();
        return $admin;
    }
}
