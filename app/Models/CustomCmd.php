<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $bot_id
 * @property integer $minrank_id
 * @property string $command
 * @property string $response
 * @property string $created_at
 * @property string $updated_at
 * @property Bot $bot
 * @property Minrank $minrank
 */
class CustomCmd extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customcommands';

    /**
     * @var array
     */
    protected $fillable = ['bot_id', 'minrank_id', 'command', 'response', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function minrank()
    {
        return $this->hasOne('OceanProject\Models\Minrank', 'id', 'minrank_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function customcmdBot()
    {
        return $this->hasOne('OceanProject\Models\Bot', 'id', 'bot_id');
    }
}
