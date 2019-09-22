<?php

namespace xatbot\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bot extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
        return $this->belongsTo('xatbot\Models\User', 'creator_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('xatbot\Models\User')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function commands()
    {
        return $this->belongsToMany(
            'xatbot\Models\Command',
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
            'xatbot\Models\Minrank',
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
        return $this->hasOne('xatbot\Models\BotStatus', 'id', 'bot_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function language()
    {
        return $this->hasOne('xatbot\Models\Language', 'id', 'language_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function server()
    {
        return $this->hasOne('xatbot\Models\Server', 'id', 'server_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function staffs()
    {
        return $this->hasMany('xatbot\Models\Staff');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function autotemps()
    {
        return $this->hasMany('xatbot\Models\AutoTemp');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function snitchs()
    {
        return $this->hasMany('xatbot\Models\Snitch');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function aliases()
    {
        return $this->hasMany('xatbot\Models\Alias');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function botlang()
    {
        return $this->belongsToMany(
            'xatbot\Models\BotlangSentences',
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
        return $this->hasMany('xatbot\Models\Response');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function badwords()
    {
        return $this->hasMany('xatbot\Models\Badword');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function linksfilter()
    {
        return $this->hasMany('xatbot\Models\LinkFilter');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function autoban()
    {
        return $this->hasMany('xatbot\Models\AutoBan');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function customcmd()
    {
        return $this->hasMany('xatbot\Models\CustomCmd');
    }
}
