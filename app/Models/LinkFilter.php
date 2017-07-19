<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $bot_id
 * @property string $link
 * @property string $created_at
 * @property string $updated_at
 * @property Bot $bot
 */
class LinkFilter extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'linksfilter';

    /**
     * @var array
     */
    protected $fillable = ['bot_id', 'link', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function linkFilterBot()
    {
        return $this->hasOne('OceanProject\Models\Bot', 'id', 'bot_id');
    }
}
