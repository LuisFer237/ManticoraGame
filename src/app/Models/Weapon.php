<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    protected $fillable = [
        'name',
        'cost',
        'range',
    ];

    public function defenders()
    {
        return $this->hasMany(Defender::class);
    }
}
