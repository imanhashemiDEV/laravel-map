<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class HomePage extends Component
{
  public $lat;
  public $lng;

    public function mount()
    {
        $this->lat = 31.311690858338736;
        $this->lng = 48.65974247202343;
  }
    #[Layout('livewire.layouts.master')]
    public function render():View
    {
        return view('livewire.home-page');
    }
}
