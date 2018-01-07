<?php

namespace xatbot;

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
class CustomCommands extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bot()
    {
        return $this->belongsTo('xatbot\Bot');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function minrank()
    {
        return $this->belongsTo('xatbot\Minrank');
    }
}
