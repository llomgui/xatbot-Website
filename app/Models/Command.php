<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description',
    ];

    protected $primaryKey = 'id';
}
