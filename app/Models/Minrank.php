<?php

namespace OceanProject;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property integer $level
 * @property string $created_at
 * @property string $updated_at
 * @property CommandMinrankBot[] $commandMinrankBots
 */
class Minrank extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'level'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandMinrankBots()
    {
        return $this->hasMany(OceanProject::CommandMinrankBot);
    }
}
