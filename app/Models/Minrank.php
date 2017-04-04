<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class Minrank extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'level',
    ];

    protected $primaryKey = 'id';
}
