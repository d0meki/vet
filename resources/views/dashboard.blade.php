<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                @can('show.mascotas')
                    <div>
                        <span><strong>Bienvenido Cliente</strong></span>
                    </div>
                @endcan
                @can('show.veterinario')
                    <div>
                        <span><strong>Bienvenido Medico Veterinario</strong></span>
                    </div>
                @endcan
                @can('show.usuarios')
                    <div>
                        <span><strong>Bienvenido Administrador</strong></span>
                    </div>
                @endcan
            </div>

        </div>
    </div>
</x-app-layout>
