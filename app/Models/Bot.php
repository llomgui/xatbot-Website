<?php

namespace OceanProject;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $bot_status_id
 * @property integer $creator_user_id
 * @property integer $server_id
 * @property integer $premium
 * @property integer $chatid
 * @property string $chatname
 * @property integer $chatpw
 * @property string $nickname
 * @property string $avatar
 * @property string $homepage
 * @property string $status
 * @property string $pcback
 * @property string $autowelcome
 * @property string $ticklemessage
 * @property integer $maxkick
 * @property integer $maxkickban
 * @property integer $maxflood
 * @property integer $maxchar
 * @property integer $maxsmilies
 * @property string $automessage
 * @property integer $automessagetime
 * @property boolean $autorestart
 * @property string $created_at
 * @property string $updated_at
 * @property BotStatus $botStatus
 * @property User $user
 * @property Server $server
 * @property BotUser[] $botUsers
 * @property CommandMinrankBot[] $commandMinrankBots
 */
class Bot extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['bot_status_id', 'creator_user_id', 'server_id', 'premium', 'chatid', 'chatname', 'chatpw', 'nickname', 'avatar', 'homepage', 'status', 'pcback', 'autowelcome', 'ticklemessage', 'maxkick', 'maxkickban', 'maxflood', 'maxchar', 'maxsmilies', 'automessage', 'automessagetime', 'autorestart'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function botStatus()
    {
        return $this->belongsTo(OceanProject::BotStatus);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(OceanProject::User, 'creator_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function server()
    {
        return $this->belongsTo(OceanProject::Server);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function botUsers()
    {
        return $this->hasMany(OceanProject::BotUser);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandMinrankBots()
    {
        return $this->hasMany(OceanProject::CommandMinrankBot);
    }
}
