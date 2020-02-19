<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Role extends Model
{
    //
    protected $table = 'roles';

    public function admins()
    {
        // a role has many admins
        $this->hasMany(Admin::class);
    }
}
