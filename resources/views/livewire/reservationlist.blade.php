<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($cars as $car)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="{{ asset('storage/'.$car->chemin )}}" alt="{{ $car->libelle }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-2">{{ $car->libelle }} - {{ $car->model }}</h2>
                    <p class="text-gray-700 mb-4">Année : {{ $car->year }}</p>
                    <p class="text-gray-700 mb-4">Nombre de sièges : {{ $car->seats }}</p>
                    <p class="text-gray-700 mb-4">Prix par jour : {{ number_format($car->price_per_day, 2) }} €</p>
                    <a href="{{ route('reserver',$car->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Réserver
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
