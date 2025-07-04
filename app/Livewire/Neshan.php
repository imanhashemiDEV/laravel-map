<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class Neshan extends Component
{

    public $lat;
    public $lng;
    public $address;
    public function mount(): void
    {
        $this->lat = 31.34456406708593;
        $this->lng = 48.71614498515577;
    }


    #[Layout('livewire.layouts.master_neshan')]
    public function render(): View
    {
        return view('livewire.neshan');
    }
}
