<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <!-- Meta author -->
    <meta name="author" content="Air Bagages">
    <!-- Meta description for SEO -->
    <meta name="description"
        content="Air Bagages vous offre des services de transport de bagages rapides et à petit prix. Réservez facilement en ligne pour une expérience sans tracas.">

    <!-- Meta keywords for SEO -->
    <meta name="keywords"
        content="transport de bagages, services de bagages, envoi de bagages, transport rapide, bagages à petit prix">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Newsreader"> --}}

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.svg') }}" type="image/x-icon">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-C6D9NXXQVD"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body>
    <!-- Navbar -->
    @include('frontend.nav')
    <div class="titre container  px-5 pt-5 ">
        <h5 class=" col-lg-4 p-2 bg-blue-950  text-white">
            @yield('titre')
        </h5>
    </div>
    <!-- Form Section -->

    <main class="flex-grow p-1">

        @yield('form')
    </main>
    <section class="services">


        <div class="container ">
            @yield('service')
        </div>
    </section>
    <!-- Footer Section -->
    @include('frontend.footer')
    <!-- fin footer -->
    <div class="bg-light p">
        <p class="mt-4 text-center text-dark">&copy; 2024 Tous droits réservés</p>

    </div>
    @livewireScripts
    {{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <div class="fixed bottom-4 right-4">
        <a href="https://wa.me/+221776237060" target="_blank" class="whatsapp-button ">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" class="w-20 h-20">
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/nav.js') }}"></script>

    @stack('scripts')

</body>

</html>
