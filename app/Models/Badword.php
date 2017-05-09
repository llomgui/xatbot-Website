<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class Badword extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['badword', 'method'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'badwords';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function badword_bot()
    {
        return $this->hasOne('OceanProject\Models\Bot', 'id', 'bot_id');
    }
}
