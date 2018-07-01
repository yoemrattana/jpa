<?php

namespace App;

use Zizaco\Entrust\EntrustRole;


class Role extends EntrustRole
{
    protected $fillable = [
        'name'
    ];

    public function users(){
        $this->belongsToMany('App\User', 'role_user');
    }
}
