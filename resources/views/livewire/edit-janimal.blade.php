<div>

    <a class="btn btn-green" wire:click="$set('open',true)">

        <i class="fas fa-edit"></i>
    </a>

    <x-jet-dialog-modal wire:model="open">

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

            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-danger-button>
        </x-slot>

    </x-jet-dialog-modal>

</div>
