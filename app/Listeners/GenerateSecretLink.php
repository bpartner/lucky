<?php

namespace App\Listeners;

use App\Services\PageService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;

class GenerateSecretLink
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private PageService $pageService)
    {
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     *
     * @return void
     */
    public function handle(Registered $event): void
    {
        /** @var \App\Models\User $user */
        $user = $event->user;

        $code = $this->pageService->generate();

        $this->pageService->create($user, $code);
        $user->sendGeneratedLinkByMail($code);
    }
}
