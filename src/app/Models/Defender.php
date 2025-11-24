<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Defender extends Model
{
    protected $fillable = [
        'game_id',
        'api_id',
        'name',
        'image',
        'gold',
        'weapon_id',
        'shots_fired',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function weapon()
    {
        return $this->belongsTo(Weapon::class);
    }
}
