<div wire:init="loadPage">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <x-table>
            {{-- EL DESPLEGABLE DE LA CANTIDAD DE VALORES DE LA TABLA --}}
            <div class="px-6 py-4 flex items-center">
               {{--  <div class="flex items-center">
                    <span>Mostrar</span>
                    <select wire:model="cant" class="mr-4 ml-4 form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>Entradas</span>
                </div> --}}

                {{-- <input type="text" wire:model="search"> --}}
                {{-- <x-jet-input class="w-full" placeholder="Escriba lo que quiere buscar" type="text" wire:model="search" /> --}}
                {{-- BUSCADOR DE LA TABLA --}}
               {{--  <x-jet-input class="flex-1 mr-4 ml-4" placeholder="Escriba lo que quiere buscar" type="text"
                    wire:model="search" />
                @livewire('create-post') --}}
            </div>
            {{-- LA TABLA CABECERA CON FUNCIONALIDAD DE ORDENAMIENTO --}}
            {{-- @if ($posts->count()) --}}
            @if (count($usuarios))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')">
                                ID

                                @if ($sort == 'id')

                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif

                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('name')">
                                Nombre
                                @if ($sort == 'name')

                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif

                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Correo
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Telefono
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Direccion
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rol
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    {{-- CUERPO DE LA TABLA DONDE MOSTRAMOS LOS DATOS --}}
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($usuarios as $item)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->id }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->name }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->email }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->phone }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->address }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                         @forelse ($item->roles as $role)
                                             <span class="badge badge-info"> {{ $role->name }} </span>
                                         @empty
                                         <span class="badge badge-danger"> No roles </span>
                                         @endforelse
                                    </div>
                                </td>
                               {{--  <td class="px-6 py-4 text-sm font-medium">
                                    <a class="btn btn-green" wire:click="edit({{ $item }})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td> --}}
                                {{-- <td>
                                    <a class="btn btn-red mr-4" wire:click="$emit('deletePost',{{ $item->id }})">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               {{--  @if ($posts->hasPages())
                    <div class="px-6 py-3">
                        {{ $posts->links() }}
                    </div>
                @endif --}}
            @else
                <div class="px-6 py-4">
                    No existe ningun Registro coinsidente
                </div>
            @endif

            {{-- @if ($posts->hasPages())
            <div class="px-6 py-3">
                {{ $posts->links() }}
            </div>
            @endif --}}

        </x-table>



    </div>

    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script>
            Livewire.on('deletePost', postId => {
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

                        Livewire.emitTo('show-posts','delete', postId)

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