<?php

namespace xatbot\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $department_id
 * @property string $subject
 * @property boolean $state
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property TicketDepartment $ticketDepartment
 * @property TicketMessage[] $ticketMessages
 */
class Ticket extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'department_id', 'subject', 'state', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('xatbot\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticketDepartment()
    {
        return $this->belongsTo('xatbot\Models\TicketDepartment', 'department_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticketMessages()
    {
        return $this->hasMany('xatbot\Models\TicketMessage');
    }
}
