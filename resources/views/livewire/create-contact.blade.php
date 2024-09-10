<div class="container mx-auto px-4">
    <form id="baggage-form" wire:submit.prevent='submit' method="POST" class="rounded-lg shadow-lg p-6 bg-white">
        @csrf
        @method('post')

        {{-- <div wire:loading.delay.long class="flex justify-center">
            <button disabled type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                <svg aria-hidden="true" role="status" class="inline w-4 h-4 mr-3 text-white animate-spin"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="#E5E7EB" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentColor" />
                </svg>
                Envoi en cours...
            </button>
        </div> --}}

        @if (Session::get('success'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                        </svg></div>
                    <div>
                        <p class="font-bold">Notification</p>
                        <p class="text-sm">{{ Session::get('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <h6 class="py-3 fw-bold px-3">NOUS SOMMES À VOTRE ÉCOUTE</h6>
        <h4 class="py-3 fw-bold px-3">
            Dans le cas où vous n'auriez pas trouvé la réponse à votre question à travers notre
            plateforme, vous pouvez nous contacter par ce formulaire.
        </h4>

        <div class="form-group  ">
            <input type="text"
                class="form-control h-14  border-1 border-blue-950 @error('nom') border-red-500 bg-red-100 animate-bounce @enderror"
                id="first-name" wire:model='nom' placeholder="Prénom et Nom au complet">
            @error('nom')
                <div class="text text-red-500 mt-1">*{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group  ">
            <input type="text"
                class="form-control h-14  border-1 border-blue-950 @error('nom') border-red-500 bg-red-100 animate-bounce @enderror"
                id="first-name" wire:model='sujet' placeholder="Sujet">
            @error('sujet')
                <div class="text text-red-500 mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">

            <input type="tel"
                class="form-control border-1 border-blue-950 h-14 @error('telephone') border-red-600 bg-red-100 animate-bounce @enderror"
                id="phone" wire:model='telephone' placeholder="Votre numéro de téléphone">

            @error('telephone')
                <div class="text text-red-500 mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <input type="email"
                class="form-control h-14 border-1 border-blue-950 @error('email') border-red-600 bg-red-100 animate-bounce @enderror"
                id="email" wire:model='email' placeholder="Email">
            @error('email')
                <div class="text text-red-500 mt-1">*{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <textarea class="form-control border-1 border-blue-950" placeholder="Votre message" id="message" name="message"
                wire:model='message' style="height: 200px;"></textarea>
            @error('message')
                <div class="text text-red-500 mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-right mt-3">
            <button type="submit"
                class="bg-blue-950 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-md">
                Envoyer
            </button>
        </div>
    </form>
</div>
