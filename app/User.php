<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Symfony\Component\HttpFoundation\Request;

//use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use EntrustUserTrait;
    //use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active',
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user');
    }

    public function isActive(){
        if ( $this->is_active == 1 ) {
            return true;
        }
        return false;
    }
    
}