<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description'];

    public function minrank()
    {
        return $this->hasOne('OceanProject\Models\Minrank', 'level', 'default_level');
    }
}
