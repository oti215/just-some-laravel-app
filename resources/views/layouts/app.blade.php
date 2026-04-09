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
    <body class="min-h-screen bg-slate-50">
        <x-toast />

        <header>
            <nav class="mx-auto flex w-full max-w-6xl items-center justify-between px-4 py-5 sm:px-6">
                <a href="{{ url('/') }}" class="text-lg font-bold text-slate-900" wire:navigate>
                    {{ config('app.name') }}
                </a>
                <div class="flex gap-4">
                    @auth
                    <x-secondary-link href="{{ url('/logout') }}" title="Logout" />
                    <x-primary-link href="{{ url('/account') }}" title="Account" />
                    @else
                    <x-secondary-button text="Login" href="{{ url('/login') }}" wire:navigate/>
                    <x-primary-button text="Register" href="{{ url('/register') }}" wire:navigate/>
                    @endauth
                </div>
            </nav>
        </header>

        <div class="container mx-auto px-4 py-10 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
