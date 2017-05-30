<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class AutoTemp extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['xatid', 'regname', 'hours'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'autotemps';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function autotempBot()
    {
        return $this->hasOne('OceanProject\Models\Bot', 'id', 'bot_id');
    }
}
