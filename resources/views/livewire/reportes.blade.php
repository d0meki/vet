<div>
    <x-slot name="header">
            <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
                {{ __('Reporte de Servicios Adquiridos') }}
            </h2>
            <x-jet-nav-link href="{{ route('show.reportes_servicios') }}" >
                            {{ __('Ver Pdf') }}
            </x-jet-nav-link>
        </x-slot>
    
        <x-table>
    
     
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="cursor-pointer px-4 py-3" wire:click="orderByProp('id')">#ID</th>
                            <th class="cursor-pointer px-4 py-3" wire:click="orderByProp('nombre')">Nombre</th>
                            <th class="cursor-pointer px-4 py-3" wire:click="orderByProp('descripcion')">Tipo_id</th>
                            <th class="cursor-pointer px-4 py-3" wire:click="orderByProp('descripcion')">Personal</th>
                            <th class="cursor-pointer px-4 py-3" wire:click="orderByProp('costo')">Costo</th>
    
                            
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($reg as $item)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 font-semibold border">{{ $item->id }}</td>
                                <td class="px-4 py-3 font-semibold leading-tighy border">{{ $item->nombre }}</td>
                                <td class="px-4 py-3 font-semibold leading-tighy border">{{ $item->tipo_id }}</td>
                                <td class="px-4 py-3 font-semibold leading-tighy border">{{ $item->personal }}</td>
                                <td class="px-4 py-3 font-semibold leading-tighy border">{{ $item->costo }}Bs</td>
    
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           
    
        </x-table>
    
    
    
    
    
        {{-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    @empty($servicios)
                        <div>
                            <h3>Lista de servicios vacio</h3>
                        </div>
                    @else
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">#ID</th>
                                    <th class="px-4 py-2">Nombre</th>
                                    <th class="px-4 py-2">Descripcion</th>
                                    <th class="px-4 py-2">Costo</th>
                                    <th class="px-4 py-2">ImagenURL</th>
                                    <th class="px-4 py-2">Estado</th>
                                    <th class="px-4 py-2">Creado el:</th>
                                    <th class="px-4 py-2">Modificado el:</th>
                                    <th class="px-4 py-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicios as $item)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $item->id }}</td>
                                        <td class="border px-4 py-2">{{ $item->nombre }}</td>
                                        <td class="border px-4 py-2">{{ $item->descripcion }}</td>
                                        <td class="border px-4 py-2">{{ $item->costo }}</td>
                                        <td class="border px-4 py-2">{{ $item->imagenurl }}</td>
                                        <td class="border px-4 py-2">{{ $item->status }}</td>
                                        <td class="border px-4 py-2">{{ $item->created_at }}</td>
                                        <td class="border px-4 py-2">{{ $item->updated_at }}</td>
                                        <td class="border px-4 py-2">
                                            <button
                                                class="flex px-4 py-2 bg-gray-500 text-gray-900 cursor-pointer">Edit</button>
                                            <button
                                                class="flex px-4 py-2 bg-red-100 text-gray-900 cursor-pointer">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endempty
                </div>
            </div>
        </div> --}}
    
    
    </div>
    