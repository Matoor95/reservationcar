<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ReservationNotification;

class ReservationCreate extends Component
{
    public $car;
    public $start_date;
    public $end_date;
    public $total_price;
    protected $rules = [
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
    ];
    // public function updated($field)
    // {
    //     if (in_array($field, ['start_date', 'end_date'])) {
    //         $this->calculateTotalPrice();
    //         session()->flash('debug', 'updated method called');

    //     }
    // }
    public function calculateTotalPrice()
    {
        if ($this->start_date && $this->end_date) {
            $days = Carbon::parse($this->start_date)->diffInDays(Carbon::parse($this->end_date)) + 1;
            $this->total_price = $days * $this->car->price_per_day;
        } else {
            $this->total_price = null;
        }
    }
    public function store()
    {
        $this->validate();

        // Vérifier si la voiture est déjà réservée pour les dates sélectionnées
        $existingReservation = Reservation::where('car_id', $this->car->id)
            ->where(function ($query) {
                $query->whereBetween('start_date', [$this->start_date, $this->end_date])
                      ->orWhereBetween('end_date', [$this->start_date, $this->end_date])
                      ->orWhere(function ($query) {
                          $query->where('start_date', '<=', $this->start_date)
                                ->where('end_date', '>=', $this->end_date);
                      });
            })->exists();

        if ($existingReservation) {
            session()->flash('error', 'Cette voiture est déjà réservée pour les dates sélectionnées.');
            return;
        }

        // Créer la réservation
        $reservation= Reservation::create([
            'car_id' => $this->car->id,
            'user_id' => Auth::id(),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'total_price' => $this->total_price,
        ]);
        $admins=User::where('role','admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new ReservationNotification($reservation));
        }

        session()->flash('success', 'Votre réservation a été effectuée avec succès.');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.reservation-create');
    }
}
