<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'status',
        'city_hp',
        'manticore_hp',
        'manticore_distance',
        'enemy_name',
        'enemy_type',
        'enemy_dimension',
    ];

    public function defenders()
    {
        return $this->hasMany(Defender::class);
    }

    public function battleLogs()
    {
        return $this->hasMany(BattleLog::class);
    }
}
