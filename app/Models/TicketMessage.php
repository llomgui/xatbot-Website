<?php

namespace OceanProject\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $ticket_id
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Ticket $ticket
 */
class TicketMessage extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'ticket_id', 'message', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('OceanProject\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo('OceanProject\Models\Ticket');
    }
}
