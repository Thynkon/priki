<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            <header class="h-20 py-2">
                <x-nav.navbar />
            </header>

            <!-- Page Content -->
            <main class="z-10 mt-4">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        @stack('scripts')
        @livewireScripts
    </body>
</html>