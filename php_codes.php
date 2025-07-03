<?php


use Livewire\Attributes\Renderless;

class Neshan {

    public $lat;
    public $lng;
    public $start = [];
    public $end = [];

    public $distance=0;
    public $response;

    public function mount(): void
    {
        $this->lat = 31.34456406708593;
        $this->lng = 48.71614498515577;
    }

    #[Renderless]
    public function setStart($lat, $lng): void
    {
        $this->start[] = $lat;
        $this->start[] = $lng;
    }

    #[Renderless]
    public function setEnd($lat, $lng): void
    {
        $this->end[] = $lat;
        $this->end[] = $lng;
    }

    public function calculateDistance()
    {
        $response = Http::acceptJson()->withHeaders([
            'Api-Key' => 'service.eada9e20a7e649f59f5dc2fe86c993a5',
        ])->withQueryParameters([
            'origin' => implode(',', $this->start),
            'destination' => implode(',', $this->end),
        ])->get('https://api.neshan.org/v4/direction');
        $this->distance = json_decode($response)->routes[0]->legs[0]->distance->text;
    }

}

