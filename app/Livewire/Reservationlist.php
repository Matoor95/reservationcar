<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class Reservationlist extends Component
{
    public function render()
    {
        $cars=Car::all();
        return view('livewire.reservationlist',compact('cars'));
    }
}
