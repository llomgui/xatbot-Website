<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class Alias extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['alias'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'aliases';
}
