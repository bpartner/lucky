<?php

namespace App\Services;

use App\Models\Lucky;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class LuckyService
{
    /**
     * @throws \Exception
     */
    public function generate(): int
    {
        return random_int(1, 1000);
    }

    public function create(User $user, int $capture): Lucky
    {
        return Lucky::query()->create([
            'user_id' => $user->id,
            'capture' => $capture,
        ]);
    }

    public function getHistory(User $user): Collection
    {
        return $user->luckies()->take(3)->get();
    }
}
