<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $bot_id
 * @property integer $xatid
 * @property string $regname
 * @property integer $hours
 * @property string $method
 * @property string $created_at
 * @property string $updated_at
 * @property Bot $bot
 */
class AutoBan extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['bot_id', 'xatid', 'regname', 'hours', 'method', 'created_at', 'updated_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'autobans';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function AutoBanbot()
    {
        return $this->hasOne('OceanProject\Models\Bot', 'id', 'bot_id');
    }
}
