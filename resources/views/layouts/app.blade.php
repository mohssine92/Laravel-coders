<!DOCTYPE html>  {{-- plantilla principal --}}

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">  {{-- retorna valor config/app.php {'locale' => 'en',} --}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>  {{-- retorna valores .env --}}

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">  {{-- mix() = asset() se posicionan en public/+concatenacion  --}}
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">  {{-- todas vista extienda de esta lantilla tien disp estos stiloss de font  --}}

        @livewireStyles  {{-- aqua esta incorporando los estilos de livewire --}}

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script> {{-- defer => pasarle valor defer es justo si hubiera poner script al final del body  --}}
    </head>

    <body class="font-sans antialiased">

      {{--   <x-jet-banner /> --}}

        <div class="min-h-screen bg-gray-100">

            @livewire('navigation-menu')



            <!-- Page Content -->
            <main>
                 {{ $slot }}
            </main>

        </div>

        @stack('modals')

        @livewireScripts

    </body>

</html>

