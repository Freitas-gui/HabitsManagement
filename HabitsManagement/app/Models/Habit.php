<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Habit extends Model
{
    protected $fillable = [
        'title', 'priority', 'description', 'why', 'how', 'when', 'how_much', 'where', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
