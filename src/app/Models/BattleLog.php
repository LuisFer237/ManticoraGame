<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BattleLog extends Model
{
    protected $fillable = [
        'game_id',
        'round_number',
        'message',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
