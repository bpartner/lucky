<?php

namespace App\Services;

use App\Models\Page;
use App\Models\User;

class UserService
{
    public function getPage(User $user, string $code): ?Page
    {
        return $user->page()->where('code', $code)->first();
    }
}
