<?php

namespace xatbot\Models;

use Illuminate\Database\Eloquent\Model;

class BotlangSentences extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'sentences'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'botlang_sentences';

    protected $casts = [
        'sentences' => 'array'
    ];
}
