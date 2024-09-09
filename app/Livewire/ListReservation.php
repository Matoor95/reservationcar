<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;
use Livewire\WithPagination;

class ListReservation extends Component
{
    // public $search='';
    public $isModalOpen = false;
    public $selectedStatus;
    public $selectedDeliveryId;
    use WithPagination;
    public function openEditModal($id)
    {
        $this->selectedDeliveryId = $id;
        $this->isModalOpen = true;
    }

    public function updateStatus()
    {
        $this->validate([
            'selectedStatus' => 'required',
        ]);

        // Trouver la livraison et mettre à jour le statut
        $livraison = Reservation::find($this->selectedDeliveryId);
        $livraison->status = $this->selectedStatus;
        $livraison->save();

        // // Trouver le client lié à cette livraison
        // $client = User::join('commandes', 'commandes.user_id', '=', 'users.id')
        //     ->where('users.id', $livraison->user_id)
        //     ->first();



        // Fermer le modal et réinitialiser les variables
        $this->isModalOpen = false;
        $this->reset(['selectedStatus', 'selectedDeliveryId']);
        // Envoyer la notification
        // Notification::send($client, new StatutLivraisonClient($livraison->reference, $livraison->status));

        // Flash message de succès
        session()->flash('success', 'Le statut de la livraison a été mis à jour avec succès.');
    }    public function render()
    {
        $reservations=Reservation::paginate(10);
        return view('livewire.list-reservation',compact('reservations'));
    }
}
