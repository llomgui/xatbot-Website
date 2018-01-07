<?php

namespace xatbot\Models;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description'];

    public function minrank()
    {
        return $this->hasOne('xatbot\Models\Minrank', 'level', 'default_level');
    }
}
