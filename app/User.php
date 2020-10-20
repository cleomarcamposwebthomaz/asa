<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Kyslik\ColumnSortable\Sortable;
use EloquentFilter\Filterable;

class User extends Authenticatable
{
    use Notifiable, Sortable, Filterable;

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

    public function getCreatedAtAttribute($data) 
    {
        return date('d/m/Y h:m:s', strtotime($data));
    }

    public function getUpdatedAtAttribute($data) 
    {
        return date('d/m/Y h:m:s', strtotime($data));
    }    
}