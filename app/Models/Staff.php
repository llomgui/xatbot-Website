<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['xatid', 'regname', 'minrank_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'staffs';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function staffMinrank()
    {
        return $this->hasOne('OceanProject\Models\Minrank', 'id', 'minrank_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function staffBot()
    {
        return $this->hasOne('OceanProject\Models\Bot', 'id', 'bot_id');
    }
}
