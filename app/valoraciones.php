<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class valoraciones extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pelicula', 'id_user', 'fecha', 'valoracion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
