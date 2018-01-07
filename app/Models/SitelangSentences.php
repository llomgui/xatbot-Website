<?php

namespace xatbot\Models;

use Illuminate\Database\Eloquent\Model;

class SitelangSentences extends Model
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
    protected $table = 'sitelang_sentences';

    protected $casts = [
        'sentences' => 'array'
    ];
}
