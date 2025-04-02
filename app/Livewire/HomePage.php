<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Stevebauman\Location\Facades\Location;
use Stevebauman\Location\Position;

class HomePage extends Component
{
  public $lat;
  public $lng;

    public function mount()
    {
        $this->lat = 31.34456406708593;
        $this->lng = 48.71614498515577;

//        $ip = request()->ip(); //Dynamic IP address get
//        $data= Location::get($ip);
//        dd($data);
    }

    public function getPostion($lat,$lng)
    {
        dd($lat,$lng);
  }
    #[Layout('livewire.layouts.master')]
    public function render():View
    {
        return view('livewire.home-page');
    }
}
