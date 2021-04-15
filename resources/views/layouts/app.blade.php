<!DOCTYPE html>  {{-- apartir de laravel 8 , este archivo se instacia como componente de blade , ya no se extiende .asi esta es vista de componente de classe--}}

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

        @livewireStyles  {{-- aqua esta incorporando los estilos de livewire --}}

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script> {{-- defer => pasarle valor defer es justo si hubiera poner script al final del body  --}}
    </head>

    <body class="font-sans antialiased">

        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">

            @livewire('navigation-menu')   {{--esta es la forma de instanciar o llamar componente de livewire--}}



            <!-- Page Content -->
            <main>
                 {{ $slot }}
            </main>

        </div>

        @stack('modals')

        @livewireScripts

    </body>

</html>
