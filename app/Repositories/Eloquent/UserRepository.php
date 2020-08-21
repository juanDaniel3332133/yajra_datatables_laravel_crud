<?php

namespace App\Repositories\Eloquent;

use App\Models\User;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
    	parent::__construct($user);
    }
}
