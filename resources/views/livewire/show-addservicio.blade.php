<div wire:init="loadPage">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Servicios Brindados
        </h2>
    </x-slot>

    @livewire('create-addservicio')

    <div class="mb-4">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
            <x-table>
                <div class="px-6 py-4 flex items-center">
                    <div class="flex items-center">
                        <span>Mostrar</span>
                        <select class="mr-4 ml-4 form-control"> {{-- wire:model="cant" --}}
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                        <span>Entradas</span>
                    </div>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>{{-- wire:click="order('id')" --}}
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre espesifico
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cliente
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Mascota
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Personal
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tipo de servicio
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jaula
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Costo
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Funciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($serv as $item)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->id }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->nombre }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->user->name }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->mascota->nombre }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->personal }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->tipo->nombre }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    @if (!empty($item->jaula->nombre))
                                        <div class="text-sm text-gray-900">{{ $item->jaula->nombre }}</div>
                                    @else
                                        <div class="text-sm text-gray-900">null</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->costo }}Bs</div>
                                </td>
                                <td class="px-6 py-4  text-sm font-medium flex">
                                    <ol>
                                        {{-- <li>
                                            <a href="#" class="text-red-600 hover:text-red-900"
                                                wire:click="$emit('deleteServicio',{{ $item->id }})">
                                                eliminar
                                            </a>
                                        </li> --}}
                                        <li>
                                            <a href="#" class="text-green-600 hover:text-green-900"
                                                wire:click="crearRecursos({{ $item }})">
                                                Agregar recursos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="text-green-600 hover:text-green-900"
                                                wire:click="crearRecetas({{ $item }})">
                                                Agregar receta
                                            </a>
                                        </li>
                                        <li>
                                            @livewire('ver-recursos',['servicio' => $item],key($item->id))
                                        </li>
                                    </ol>
                                </td>
                                {{-- <td>
                                    <div class="hidden sm:flex sm:items-center sm:ml-6" position: relative>
                                        <x-jet-dropdown align="right" width="60">
                                            <x-slot name="trigger">
                                                <x-jet-nav-link href="#">
                                                    Acciones
                                                </x-jet-nav-link>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-jet-dropdown-link href="#"
                                                    wire:click="crearRecursos({{ $item }})">
                                                    {{ __('Agregar Recursos') }}
                                                </x-jet-dropdown-link>
                                                <x-jet-dropdown-link href="#"
                                                    wire:click="crearRecetas({{ $item }})">
                                                    {{ __('Agregar Receta') }}
                                                </x-jet-dropdown-link>
                                                @livewire('ver-recursos',['servicio' => $item],key($item->id))
                                                <x-jet-dropdown-link href="#"
                                                    wire:click="$emit('deleteServicio',{{ $item->id }})">
                                                    {{ __('Eliminar') }}
                                                </x-jet-dropdown-link>
                                            </x-slot>
                                        </x-jet-dropdown>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-table>
        </div>

    </div>
    <x-jet-dialog-modal wire:model="open_recursos">

        <x-slot name='title'>
            Recursos Utilizados
        </x-slot>

        <x-slot name='content'>

            <div>
                <x-jet-label value="Id Servicio" />
                <x-jet-input wire:model="id_servicio" type="text" class=" w-full" disabled />
            </div>
            <div>
                <x-jet-label value="nombre" />
                <x-jet-input type="text" wire:model="nombre_recurso" class=" w-full" />
            </div>
            <div>
                <x-jet-label value="numero de serie" />
                <x-jet-input type="text" wire:model="serie" class=" w-full" />
            </div>
            <div>
                <x-jet-label value="Tipo" />
                <x-jet-input type="text" wire:model="tipo" class=" w-full" />
            </div>
            <div>
                <x-jet-label value="Costo" />
                <x-jet-input type="number" wire:model="costo_recurso" class=" w-full" />
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-danger-button wire:click="saveRecursos" wire:loading.attr="disabled" class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
            <x-jet-secondary-button wire:click="$set('open_recursos',false)">
                Terminar
            </x-jet-secondary-button>
        </x-slot>

    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="open_recetas">

        <x-slot name='title'>
            Add Receta
        </x-slot>

        <x-slot name='content'>

            <div>
                <x-jet-label value="Id Servicio" />
                <x-jet-input wire:model="id_servicio" type="text" class=" w-full" disabled />

            </div>
            <div>
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" wire:model="nombre_medicamento" class=" w-full" />
            </div>
            <div>
                <x-jet-label value="Dosis" />
                <x-jet-input type="text" wire:model="dosis" class=" w-full" />
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-danger-button wire:click="saveRecetas" wire:loading.attr="disabled" class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
            <x-jet-secondary-button wire:click="$set('open_recetas',false)">
                Terminar
            </x-jet-secondary-button>
        </x-slot>

    </x-jet-dialog-modal>

    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script>
            Livewire.on('deleteServicio', servId => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('show-addservicio', 'delete', servId)

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
