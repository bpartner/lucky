<?php

namespace App\Http\Livewire;

use App\Services\LuckyService;
use Livewire\Component;

class LuckyGenerator extends Component
{
    public int $capture;
    public bool $win;
    public float|int $total;

    public function render()
    {
        return view('livewire.lucky-generator');
    }

    /**
     * @throws \Exception
     */
    public function generate(LuckyService $luckyService)
    {
        $this->capture = $luckyService->generate();
        $lucky = $luckyService->create(auth()->user(), $this->capture);
        $this->win = $lucky->isWin();
        $this->total = $lucky->value();
    }
}
