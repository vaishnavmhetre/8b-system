<?php

namespace App;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, GeneratesUuid;

    public $uuidVersion = 'ordered';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'uuid' => 'uuid'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'talathi_id', 'id');
    }
}
