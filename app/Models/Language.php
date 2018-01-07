<?php

namespace xatbot\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';

    /**
     * @var array
     */
    protected $fillable = ['name', 'code', 'created_at', 'updated_at'];
}
