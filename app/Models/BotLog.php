<?php

namespace OceanProject;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $chatid
 * @property integer $typemessage
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 */
class BotLog extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'botlogs';

    /**
     * @var array
     */
    protected $fillable = ['chatid', 'typemessage', 'message', 'created_at', 'updated_at'];
}
