<div>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('Servicios') }}
        </h2>
    </x-slot>

    <x-table>
        <div class="px-6 py-4 flex items-center">
            <input class="flex-1 mr-4" type="text" placeholder="Busqueda" wire:model="search">
            @include('livewire.create-servicio')
        </div>
        @if ($servicios->count())
            <table class="w-full">
                <thead>
                    <tr
                        class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <th class="cursor-pointer px-4 py-3" wire:click="orderByProp('id')">#ID</th>
                        <th class="cursor-pointer px-4 py-3" wire:click="orderByProp('nombre')">Nombre</th>
                        <th class="cursor-pointer px-4 py-3" wire:click="orderByProp('descripcion')">Descripcion</th>
                        <th class="cursor-pointer px-4 py-3" wire:click="orderByProp('costo')">Costo</th>
                        <th class="px-4 py-3">ImagenURL</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="cursor-pointer px-4 py-3" wire:click="orderByProp('created_at')">Creado el:</th>
                        <th class="cursor-pointer px-4 py-3" wire:click="orderByProp('created_at')">Modificado el:</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($servicios as $item)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 font-semibold border">{{ $item->id }}</td>
                            <td class="px-4 py-3 font-semibold leading-tighy border">{{ $item->nombre }}</td>
                            <td class="px-4 py-3 font-semibold leading-tighy border">{{ $item->descripcion }}</td>
                            <td class="px-4 py-3 font-semibold leading-tighy border">{{ $item->costo }}Bs</td>
                            <td class="px-4 py-3 font-semibold leading-tighy border">{{ $item->imagenurl }}</td>
                            <td class="px-4 py-3 font-semibold leading-tighy border">{{ $item->status }}</td>
                            <td class="px-4 py-3 font-semibold leading-tighy border">{{ $item->created_at }}</td>
                            <td class="px-4 py-3 font-semibold leading-tighy border">{{ $item->updated_at }}</td>
                            <td class="px-4 py-3">
                                <button wire:click="edit({{ $item->id }})"
                                    class="p-2 pl-5 pr-5 bg-blue-500 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300">
                                    Actualizar
                                </button>
                                <button wire:click="delete({{ $item->id }})"
                                    class="p-2 pl-5 pr-5 bg-red-500 text-gray-100 text-lg rounded-lg focus:border-4 border-red-500">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="px-6 py-4">
                No existe registros coincidentes
            </div>
        @endif

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
