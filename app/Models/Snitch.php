<?php

namespace xatbot\Models;

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
    public function snitchBot()
    {
        return $this->hasOne('xatbot\Models\Bot', 'id', 'bot_id');
    }
}
