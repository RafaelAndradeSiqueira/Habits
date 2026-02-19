<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habits extends Model
{
    protected $fillable = [
        'user_id',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function habitsLogs()
    {
        return $this->hasMany(HabitsLogs::class);
    }
}
