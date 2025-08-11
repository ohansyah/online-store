<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('components.order-overview-card', ['card' => $card])
            @include('components.order-overview-chart', ['chart' => $chart])
        </div>
    </div>
</x-app-layout>