<div wire:init="loadJaula">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">


        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>

            <div class="px-6 py-4 flex items-center">
                <div class="flex items-center">
                    <span> Mostrar</span>

                    <select wire:model="cant" class="mx-2">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                    <span> entradas </span>
                </div>




                <x-jet-input class="flex-1 mx-4" placeholder="Bucador" type="text" wire:model="search" />

                @livewire('create-janimal')
            </div>
            @if (count($janimals))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id)">
                                ID
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('nombre')">
                                NOMBRE

                                @if ($sort == 'nombre')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1" </i>
                                    @else
                                        <i class="fas fa-sort float-right mt-1" </i>
                                @endif
                            </th>
                            <th scope="col"
                                class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('descripcion')">
                                DESCRIPCION

                                @if ($sort == 'descripcion')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1" </i>
                                    @else
                                        <i class="fas fa-sort float-right mt-1" </i>
                                @endif
                            </th>

                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>





                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($janimals as $item)

                            <tr>

                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->id }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->nombre }}


                                    </div>

                                </td>
                                <td class="px-6 py-4  text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->descripcion }}
                                    </div>

                                </td>
                                <td class="px-6 py-4  text-sm font-medium flex">

                                    <a class="btn btn-green" wire:click="edit({{ $item }})">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a class="btn btn-red ml-2" wire:click="$emit('deleteJanimal',{{ $item->id }})">
                                        <i class="fas fa-trash"></i>
                                    </a>


                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
                @if ($janimals->hasPages())
                    <div class="px-6 py-3">
                        {{ $janimals->links() }}
                    </div>
                @endif
            @else
                <div class="px-6 py-4">
                    NO existe ningun registro coincidente

                </div>
            @endif
        </x-table>
    </div>
    <x-jet-dialog-modal wire:model="open_edit">

        <x-slot name='title'>
            Editar Jaula{{ $janimal->title }}
        </x-slot>



        <x-slot name='content'>

            <div wire:loading wire:target="image"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen Cargando!</strong>
                <span class="block sm:inline">Espere un momento por favor.</span>

            </div>

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}">
            @else
                <img src="{{ Storage::url($janimal->image) }}" alt="">
            @endif


            <div>
                <x-jet-label value="Nombre de la Jaula" />
                <x-jet-input wire:model="janimal.nombre" type="text" class=" w-full" />
            </div>

            <div>
                <x-jet-label value="Descripcion de la Jaula" />
                <x-jet-input wire:model="janimal.descripcion" type="text" class=" w-full" />

            </div>

            <div>
                <input type="file" wire:model="image" id="{{ $identificador }}">
                <x-jet-input-error for="nombre" />
            </div>



        </x-slot>


        <x-slot name='footer'>

            <x-jet-secondary-button wire:click="$set('open_edit',false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

    @push('js')
        <script src="sweetalert2.all.min.js"></script>

        <script>
            Livewire.on('deleteJanimal', janimalId => {
                Swal.fire({
                    title: 'Estas Seguro?',
                    text: "Toda la informacion de la jaula se eliminara",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, elimar jaula!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('jaula', 'delete', janimalId);

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
