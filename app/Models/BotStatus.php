<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class BotStatus extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bot_statuses';
}
