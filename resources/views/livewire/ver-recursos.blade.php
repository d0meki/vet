<div>{{-- wire:init="loadPage" --}}
    <a href="#" class="text-indigo-600 hover:text-indigo-900" wire:click="$set('open',true)">
        Ver recursos Y receta
    </a>
    <x-jet-dialog-modal wire:model="open">

        <x-slot name='title'>
            lista recursos utilizados Y receta
        </x-slot>

        <x-slot name='content'>
            <samp><strong>Receta</samp></h1>
            <a class="btn btn-red mr-4 float-right" href="{{ route('ver.receta',$this->servicio->id) }}" >
                Imprimir Receta  <i class="fas fa-print"></i>
            </a>
            @if (count($recetas))
            <div class="w-full bg-white rounded-lg shadow-lg lg:w-1/3">
                <samp><strong>Fecha: {{ $recetas[0]->fecha }}</strong></samp>
                <ul class="px-0">
                    @foreach ($recetas as $item)
                        <li class="border  list-none rounded-sm px-3 py-3">{{ $item->nombre_medicamento }} -
                            {{ $item->dosis }}
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <h1><strong>Recursos</strong></h1>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
                <x-table>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>{{-- wire:click="order('id')" --}}
                                <th scope="col"
                                    class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre recurso
                                </th>
                                <th scope="col"
                                    class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Costo
                                </th>
                                <th scope="col"
                                    class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    serie
                                </th>
                                <th scope="col"
                                    class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    id Servicio
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($recursos as $item)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $item->id }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $item->nombre }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $item->costo }}Bs</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $item->serie }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $item->servicio_id }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </x-table>
            </div>

        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
