<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? config('app.name') }}</title>
        <tallstackui:script />
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="md:w-1/4 mx-auto bg-slate-50 px-4">
        <header>
            <nav class="mx-auto flex w-full py-5">
                <a href="{{ url('/') }}" class="text-lg font-bold text-slate-900" wire:navigate>
                    {{ config('app.name') }}
                </a>
            </nav>
        </header>

        <div class="container py-10">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
