<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Contact;
use Livewire\Component;
use App\Notifications\ContactNotification;

class CreateContact extends Component
{
    public $nom;
    public $email;
    public $message;
    public $telephone;
    public $sujet;
    protected $rules = [
        'nom' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:contacts',
        'message' => 'required|string|min:10',
        'telephone' => 'required|numeric',
        'sujet' => 'required|string|max:255'
    ];
    public function submit(Contact $contact){
        // dd($this->nom,$this->email,$this->sujet);


        $this->validate();
        $contact->nom = $this->nom;
        $contact->email = $this->email;
        $contact->message = $this->message;
        $contact->telephone = $this->telephone;
        $contact->sujet = $this->sujet;
        $contact->save();
        $this->reset(['nom', 'email', 'message', 'telephone', 'sujet']);
        // session()->flash('message', 'Votre message a bien été envoyé');
        $admins=User::where('role','admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new ContactNotification($contact));
        }
        return redirect()->route('contact')->with('success','Message envoye avec succes');  // redirect to the contact page after form submission  // livewire route: contact  // Laravel route: contact  // or any other route you want to redirect to after form submission.  // replace contact with your livewire route name.  // replace 'contact' with your Laravel route name.  // replace route:contact with your livewire route:
    }
    public function render()
    {
        return view('livewire.create-contact');
    }
}
