<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ListContact extends Component
{
    use WithPagination;
    public function render()
    {
        $contact=Contact::paginate(10);
        return view('livewire.list-contact',compact('contact'));
    }
}
