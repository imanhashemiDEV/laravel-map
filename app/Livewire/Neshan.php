<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class Neshan extends Component
{





    #[Layout('livewire.layouts.master_neshan')]
    public function render(): View
    {
        return view('livewire.neshan');
    }
}
