<?php

use Livewire\Component;

new class extends Component
{

};
?>

<x-app>
    <div class="w-full xl:w-1/2 mx-auto">
        <x-card>
            <x-primary-button text="Create Issue" href="{{ url('/issues/create') }}" />

            
        </x-card>

        <div class="mt-4">
            <x-card>
                Currently, there are no issues. Create one to get started.
            </x-card>
        </div>
    </div>
</x-app>