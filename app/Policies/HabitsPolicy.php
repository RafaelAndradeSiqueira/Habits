<?php

namespace App\Policies;

use App\Models\User;

class HabitsPolicy
{
   public function update(User $user, $habit)
    {
        return $user->id === $habit->user_id;
    }


    public function delete(User $user, $habit)
    {
        return $user->id === $habit->user_id;
    }

    public function toggle(User $user, $habit)
    {
        return $user->id === $habit->user_id;
    }
}
