<?php

namespace OceanProject\Models;

use Illuminate\Notifications\Notifiable as Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ultraware\Roles\Traits\HasRoleAndPermission;
use Ultraware\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use OceanProject\Mail\ResetPassword;

class User extends Authenticatable implements HasRoleAndPermissionContract
{
    use HasRoleAndPermission, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'xatid', 'regname', 'ip', 'password', 'language_id', 'share_key', 'spotify'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'spotify' => 'array',
    ];

    protected $primaryKey = 'id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function bots()
    {
        return $this->belongsToMany('OceanProject\Models\Bot')->orderBy('bot_id', 'asc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function language()
    {
        return $this->hasOne('OceanProject\Models\Language', 'id', 'language_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function botsCreated()
    {
        return $this->hasMany('OceanProject\Models\Bot', 'creator_user_id');
    }

    public function hasBot($botid)
    {
        return $this->bots()->where('bot_id', $botid)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('OceanProject\Models\Ticket');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        \Mail::to($this->email)->send(new ResetPassword($token));
    }
}
