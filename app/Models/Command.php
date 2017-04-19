<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
