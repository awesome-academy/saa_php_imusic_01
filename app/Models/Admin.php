<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Admin extends Model
{
    //
    protected $table = 'admins';

    // an admin belongsto a role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
