<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCar extends Component
{
    use WithFileUploads;
    public $car;
    public $libelle;
    public $model;
    public $year;
    public $seat;
    public $price_per_day;
    public $chemin;
    public function mount($car)
    {
        $this->car = $car;
        $this->libelle = $car->libelle;
        $this->model = $car->model;
        $this->year = $car->year;
        $this->seat = $car->seats;
        $this->price_per_day = $car->price_per_day;
    }
    public function update()
    {
        $car = Car::find($this->car->id);

        $this->validate([
            'libelle' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'seat' => 'required|integer',
            'price_per_day' => 'required|numeric',
        ]);
        $car->libelle = $this->libelle;
        $car->model = $this->model;
        $car->year = $this->year;
        $car->seats = $this->seat;
        $car->price_per_day = $this->price_per_day;
        if ($this->chemin) {
            $car->chemin = $this->chemin->store('Car', 'public');
        }
        $car->save();
        return redirect()->route('car.index')->with('success', 'Car modifie avec succes');
    }
    public function render()
    {
        return view('livewire.edit-car');
    }
}
