<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class Snitch extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['xatid', 'regname'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'snitchs';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function snitch_bot()
    {
        return $this->hasOne('OceanProject\Models\Bot', 'id', 'bot_id');
    }
}
