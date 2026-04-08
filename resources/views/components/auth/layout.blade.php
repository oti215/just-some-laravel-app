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
        <div class="mx-auto flex min-h-screen w-full max-w-6xl items-center justify-center px-4 py-10 sm:px-6">
            <div class="w-full max-w-md">
                <div class="mb-5 text-center">
                    <a href="{{ url('/') }}" class="text-2xl font-semibold text-slate-900">{{ config('app.name') }}</a>
                    @if (filled($subtitle ?? null))
                        <p class="mt-1 text-sm text-slate-600">{{ $subtitle }}</p>
                    @endif
                </div>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>
