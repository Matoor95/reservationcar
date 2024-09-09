<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCar extends Component
{
    use WithFileUploads;
    public $libelle;
    public $model;
    public $year;
    public $seat;
    public $price_per_day;
    public $chemin;

    public function store(Car $car)
    {
        // dd($this->libelle,$this->model,$this->year,$this->seat,$this->price_per_day,$this->chemin);
        $this->validate([
            'libelle' => 'required| string| max:255',
            'model' => 'required| string| max:255',
            'year' => 'required| integer',
            'seat' => 'required| integer',
            'price_per_day' => 'required| numeric',
            'chemin' => 'image|max:2024',
        ]);

        $car->libelle = $this->libelle;
        $car->model = $this->model;
        $car->year = $this->year;
        $car->seats = $this->seat;
        $car->price_per_day = $this->price_per_day;
        if ($this->chemin) {
            $car->chemin = $this->chemin->store('Car', 'public');
        }
        // dd($car);
        $car->save();

        // Save the car to the database



        session()->flash('message', 'Voiture créée avec succès');
        return redirect()->route('car.index');
    }
    public function render()
    {
        return view('livewire.create-car');
    }
}
