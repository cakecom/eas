<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    const Director_TYPE = 1;
    const Manager_TYPE = 2;
    const DEFAULT_TYPE = 0;

    public static function register(array $array)
    {

        return static::create($array);

    }

    public function Director(){
        return $this->type === self::Director_TYPE;
    }
    public function Manager(){
        return $this->type === self::Manager_TYPE;
    }

}
