<div class="p-2 bg-white shadow-sm">

    <form method="POST" wire:submit.prevent="update">
        @csrf
        @method('post')

        @if (Session::get('error'))
            <div class="p-5">
                <div class="p-4 border-red-500 bg-red-400 animate-bounce text-white">{{ Session::get('error') }}</div>
            </div>
        @endif
        <div class=" grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2 content-center p-5  ">
            <div>
                <x-input-label value="{{ __('Libelle') }}" />
                <input type="text"
                    class="block mt-1 rounded-md border-gray-300 w-full @error('libelle')
            border-red-500 bg-red-100 animate-bounce
           @enderror"
                    wire:model="libelle" name="libelle">

                @error('libelle')
                    <div class="text text-red-500 mt-1"> {{ $message }}</div>
                @enderror
            </div>



            <!-- ... -->
            <div>
                <x-input-label value="{{ __('Modele ') }}" />
                <input type="text"
                    class="block mt-1 rounded-md border-gray-300 w-full @error('model')
            border-red-500 bg-red-100 animate-bounce
             @enderror"
                    wire:model="model" name="model">

                @error('model')
                    <div class="text text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <x-input-label value="{{ __('Annee') }}" />
                <input type="text"
                    class="block mt-1 rounded-md border-gray-300 w-full @error('year')
                  border-red-500 bg-red-100 animate-bounce
                  @enderror"
                    wire:model="year" name="year">

                @error('year')
                    <div class="text text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <x-input-label value="{{ __('Nombre de place') }}" />
                <input type="number"
                    class="block mt-1 rounded-md border-gray-300 w-full @error('seat')
                  border-red-500 bg-red-100 animate-bounce
                  @enderror"
                    wire:model="seat" name="seat">

                @error('seat')
                    <div class="text text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>



            <div>
                <x-input-label value="{{ __('Prix par jour') }}" />

                <input type="number"
                    class="block mt-1 rounded-md border-gray-300 w-full @error('price_per_day')
                  border-red-500 bg-red-100 animate-bounce
                  @enderror"
                    wire:model="price_per_day" name="price_per_day">

                @error('price_per_day')
                    <div class="text text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>


            <div class="flex items-center space-x-6">
                <div class="shrink-0">
                    <img class="h-16 w-16 object-cover rounded-full"
                        src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80"
                        alt="Current profile photo" />
                </div>
                <label class="block">
                    <span class="sr-only">Choisir profile photo</span>
                    <input type="file" wire:model="chemin"
                        class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-violet-50 file:text-violet-700
                hover:file:bg-violet-100
              " />
                </label>

                @error('chemin')
                    <div class="text text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>


        </div>
        <div class="p-5 flex justify-between items-center bg-gray-100">
            <button class="bg-red-600 p-3 rounded-sm text-white text-sm"
                onclick=" window.history.back();">Annuler</button>
            <button class="bg-green-600 p-3 rounded-sm text-white text-sm" type="submit">Ajouter</button>
        </div>


    </form>
</div>
