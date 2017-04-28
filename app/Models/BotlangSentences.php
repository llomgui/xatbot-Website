<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class BotlangSentences extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'default_value'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'botlang_sentences';
}
