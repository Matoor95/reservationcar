<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;

class ListCar extends Component
{
    use WithPagination;
    public $seach='';
    public function render()
    {
        $cars=Car::paginate(10);
        return view('livewire.list-car',compact('cars'));
    }
}
