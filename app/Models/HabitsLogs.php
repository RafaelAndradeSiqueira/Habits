<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitsLogs extends Model
{
    protected $fillable = [
        'habit_id',
        'user_id',
        'completed_at',
    ];

    public function habit()
    {
        return $this->belongsTo(Habits::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
