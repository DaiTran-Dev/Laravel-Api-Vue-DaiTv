<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements IUser
{
    /**
     * Get model class
     * @return Model::class
     */
    function getModel()
    {
        return User::class;
    }
}
