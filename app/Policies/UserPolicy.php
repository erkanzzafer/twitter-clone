<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\User;

class UserPolicy
{


    public function update(User $user, User $model): bool
    {
        //update edilen id ile eden id eşit mi?
        //return $user->id===$model->id;
        return $user->is($model);
    }

}
