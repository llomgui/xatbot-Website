<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'bot_status_id',
        'creator_user_id',
        'server_id',
        'premium',
        'chatid',
        'chatname',
        'chatpw',
        'nickname',
        'avatar',
        'homepage',
        'status',
        'pcback',
        'autowelcome',
        'ticklemessage',
        'maxkick',
        'maxkickban',
        'maxflood',
        'maxchar',
        'maxsmilies',
        'automessage',
        'automessagetime',
        'autorestart',
        'gameban_unban',
        'powersdisabled',
        'togglemoderation',
        'premiumfreeze'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creatorUser()
    {
        return $this->belongsTo('OceanProject\Models\User', 'creator_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('OceanProject\Models\User')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function commands()
    {
        return $this->belongsToMany(
            'OceanProject\Models\Command',
            'bot_command_minrank',
            'bot_id',
            'command_id'
        )->withPivot('minrank_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function minranks()
    {
        return $this->belongsToMany(
            'OceanProject\Models\Minrank',
            'bot_command_minrank',
            'bot_id',
            'minrank_id'
        )->withPivot('command_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function botStatus()
    {
        return $this->hasOne('OceanProject\Models\BotStatus', 'id', 'bot_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function server()
    {
        return $this->hasOne('OceanProject\Models\Server', 'id', 'server_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function staffs()
    {
        return $this->hasMany('OceanProject\Models\Staff');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function autotemps()
    {
        return $this->hasMany('OceanProject\Models\AutoTemp');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function snitchs()
    {
        return $this->hasMany('OceanProject\Models\Snitch');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function aliases()
    {
        return $this->hasMany('OceanProject\Models\Alias');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function botlang()
    {
        return $this->belongsToMany(
            'OceanProject\Models\BotlangSentences',
            'botlang',
            'bot_id',
            'botlang_sentences_id'
        )->withPivot('value')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function responses()
    {
        return $this->hasMany('OceanProject\Models\Response');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function badwords()
    {
        return $this->hasMany('OceanProject\Models\Badword');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function linksfilter()
    {
        return $this->hasMany('OceanProject\Models\LinkFilter');
    }
}
