<div class="container mx-auto px-4 py-8">
    @if (session()->has('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form wire:submit.prevent="store">
        <div class="grid grid-cols-2 gap-4">

            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 font-bold mb-2">Nom et prenom </label>
                <input type="text" id="start_date" value="{{ Auth::user()->name }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    readonly>

            </div>
            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="text" id="start_date" value="{{ Auth::user()->email }}" readonly
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('start_date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 font-bold mb-2">Date de début</label>
                <input type="date" id="start_date" wire:model="start_date"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('start_date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-gray-700 font-bold mb-2">Date de fin</label>
                <input type="date" id="end_date" wire:model="end_date"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('end_date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>


        </div>
        <div class="mb-4">
            <button type="button" wire:click="calculateTotalPrice"
                class="bg-gray-500 text-white px-4 py-2 rounded-lg">Calculer le prix total</button>
        </div>

        @if ($total_price)
            <div class="mb-4">
                <p class="text-gray-700 font-bold">Prix total : {{ number_format($total_price, 2) }} €</p>
            </div>
        @endif
        <div class="mb-4">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Réserver</button>
        </div>
    </form>
</div>
