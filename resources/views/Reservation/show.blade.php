@extends('frontend.layout')
@section('image_menu')
    <div id="default-carousel" class="relative w-full bg-light" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class=" duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/car.jpg') }}"
                    class="absolute block  -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 w-full" alt="..."
                    style="max-height: 400px";>
            </div>


        </div>
        {{-- <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>

        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-dark dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-dark dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button> --}}
    </div>
@endsection

@section('description')
    Profitez pleinement d'une large gamme de service et bénéficiez du suivi en temps réel de vos bagages.
@endsection
@section('btn')
    Envoyer maintenant <i class="fa-solid fa-chevron-right"></i>
@endsection
@section('titre')
   Historique des reservations
@endsection
@section('form')
<section class="bg-gray-50 dark:bg-gray-800">
    <div class="max-w-screen-xl px-2 py-4 mx-auto lg:space-y-10 lg:py-12 lg:px-4">
        <div class="bg-white shadow-md rounded px-4 pt-4 pb-4 mb-4">
            <div class="bg-white shadow rounded-lg">
                <div class="p-4 space-y-2">
                    <!-- Formulaire de filtre -->
                    {{-- <form method="GET" action="{{ route('client.index') }}">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Date de
                                    début</label>
                                <input type="date" name="start_date" id="start_date"
                                    value="{{ request('start_date') }}"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700">Date de
                                    fin</label>
                                <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                                <select name="status" id="status"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="">Tous</option>
                                    <option value="Votre bagage a été livré"
                                        {{ request('status') == 'Votre bagage a été livré' ? 'selected' : '' }}>Votre
                                        bagage a été livré</option>
                                    <option value="Bagage en préparation pour sa reservation"
                                        {{ request('status') == 'Bagage en préparation pour sa livraison' ? 'selected' : '' }}>
                                        Bagage en préparation pour sa livraison</option>
                                    <option value="En traitement dans notre réseau"
                                        {{ request('status') == 'En traitement dans notre réseau' ? 'selected' : '' }}>
                                        En traitement dans notre réseau</option>
                                    <option value="Votre bagages est attendu a notre point de depot"
                                        {{ request('status') == 'Votre bagage est attendu a notre point de depot' ? 'selected' : '' }}>
                                        Votre bagages est attendu a notre point de depot</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Rechercher
                            </button>
                        </div>
                    </form> --}}

                    @if ($reservations->isEmpty())
                        <div class="text-center text-red-600">
                            <p><i class="fas fa-box-open"></i>Aucune commande trouvée.</p>
                        </div>
                    @else
                        @foreach ($reservations as $reservation)
                            <!-- Example item -->
                            <div class="border rounded-lg p-2">


                            <div class="flex flex-wrap justify-between items-center mb-2">
                                <div class="text-sm text-blue-950">
                                    {{ $reservation->created_at->format('d/m/Y H:i') }}
                                </div>
                                <div class="text-sm ">
                                    <span class="font-semibold">Statut :</span> {{ $reservation->status }}
                                </div>
                            </div>

                                <div class="text-sm text-blue-950">
                                    <span class="font-semibold">Date debut:</span> {{ $reservation->start_date }}

                                </div>
                                <div class="text-sm text-blue-950">
                                    <span class="font-semibold">Date de fin:</span> {{ $reservation->end_date }}

                                </div>

                                    <div class="flex flex-wrap justify-between items-center mb-1">
                                        <div class="text-sm text-gray-700">
                                            <span class="font-semibold">nom voiture  :</span> {{ $reservation->car->libelle }} <br>
                                            <span class="font-semibold">Modele :</span> {{ $reservation->car->model }} <br>
                                            <span class="font-semibold">Nombre de place:</span> {{ $reservation->car->seats }} <br>



                                            {{-- <span class="font-semibold">Numero de suivi :</span> {{ $service->reference }} --}}

                                        </div>

                                    </div>


                                <div class="text-sm text-blue-950">
                                    <span class="font-semibold">Montant de la reservation :</span> {{ $reservation->total_price }} €


                                </div>



                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>@endsection

