<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token',];


    //scope -----------------------------------
    public function scopeWhenSearch($query , $search)
    {

        if ( isset($search['name']) && !empty($search['name'])) {
            $name = $search['name'];
                $query->where('name', 'like', "%{$name}%");
        }

    } //end of scopeWhenSearch

}
