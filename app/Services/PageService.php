<?php

namespace App\Services;

use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PageService
{
    public function create(User $user, string $code): Page
    {
        return Page::query()->create([
            'user_id'   => $user->id,
            'code'      => $code,
            'valid_for' => Carbon::now()->addDays(7),
        ]);
    }

    public function generate(): string
    {
        return Str::uuid()->getHex();
    }

    public function resetLink(User $user): string
    {
        $user->page()->delete();
        $code = $this->generate();
        $this->create($user, $code);
        return route('secret.link', $code);
    }

    public function disableLink(User $user): string
    {
        $page = $user->page;
        $page->update([
            'valid_for' => Carbon::now()->subDay()
        ]);

        return route('dashboard');
    }
}
