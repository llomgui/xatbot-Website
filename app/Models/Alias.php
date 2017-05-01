<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class Alias extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['command', 'alias'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'aliases';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function alias_bot()
    {
        return $this->hasOne('OceanProject\Models\Bot', 'id', 'bot_id');
    }
}
