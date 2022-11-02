<?php

namespace App\Http\Livewire;

use App\Services\LuckyService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class History extends Component
{
    public Collection $list;

    public function render()
    {
        return view('livewire.history');
    }

    public function getHistory(LuckyService $luckyService)
    {
        $this->list = $luckyService->getHistory(auth()->user());
    }
}
