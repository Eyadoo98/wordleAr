<?php

namespace App\Livewire\WordleAr;

use Illuminate\Support\Carbon;
use Livewire\Component;

class MainComponent extends Component
{
    public string $currentDate;

    public string $view = 'main';

    public function render()
    {
        $this->currentDate = Carbon::now()->format('F j, Y');
        return view('livewire.wordle-ar.main-component');
    }

}
