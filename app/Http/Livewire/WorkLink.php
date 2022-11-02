<?php

namespace App\Http\Livewire;

use App\Services\PageService;
use App\Services\UserService;
use Livewire\Component;

class WorkLink extends Component
{
    public function render()
    {
        return view('livewire.work-link');
    }

    public function resetLink(PageService $userService)
    {
       $link = $userService->resetLink(auth()->user());

       return $this->redirect($link);
    }

    public function disableLink(PageService $userService)
    {
       $link =  $userService->disableLink(auth()->user());

        return $this->redirect($link);
    }
}
