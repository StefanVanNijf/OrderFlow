<?php

namespace App\Livewire;

use App\Models\MenuCategory;
use Livewire\Component;

class CheckLocation extends Component
{
    public $latitude;
    public $longitude;
    public $allowed = false;
    protected $listeners = ['setLocation'];

    public function setLocation($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        $restaurantLat = '51.597588509064444';
        $restaurantLon = '4.779068255835475';
        $radius = 1; // 1 kilometer

        if ($this->calculateDistance($this->latitude, $this->longitude, $restaurantLat, $restaurantLon) <= $radius) {
            $this->allowed = true;
            $this->dispatch('set-allowed-in-session');
        }
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        return ($miles * 1.609344);
    }

    public function render()
    {
        $categories = MenuCategory::with('menuItems')->get();
        return view('livewire.check-location', ['categories' => $categories]);
    }
}
