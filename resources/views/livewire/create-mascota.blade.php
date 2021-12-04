<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" style="background-image: url('img/Kye.jpg')">
        <x-jet-danger-button wire:click="$set('open',true)">
            Añadir mascota
        </x-jet-danger-button>
    </div>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Añadir Nueva Mascota
        </x-slot>
        <x-slot name="content">
            <div wire:loading wire:target="image"
                class="bg-red-100 border border-red400 text-red-700 px-4 py-3 rounded relative">
                <strong class="font-bold">Imagen Cargando!!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado</span>
            </div>

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}">
            @endif

            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model.defer="nombre" />

                <x-jet-input-error for='nombre' />
            </div>
            <div class="mb-4">
                <x-jet-label value="Tipo" />
                <x-jet-input type="text" class="w-full" wire:model.defer="tipo" />

                <x-jet-input-error for='tipo' />
            </div>
            <div class="mb-4">
                <x-jet-label value="Raza" />
                <x-jet-input type="text" class="w-full" wire:model.defer='raza' />

                <x-jet-input-error for='raza' />
            </div>
            <div class="mb-4">
                <x-jet-label value="Sexo" />
                {{-- <x-jet-input type="text" class="w-full" /> --}}
                <select class="mr-4 form-control" wire:model.defer="sexo">
                    <option value="Hembra">Hembra</option>
                    <option value="Macho">Macho</option>
                </select>
                <x-jet-input-error for='sexo' />
            </div>
            <div class="mb-4">
                <x-jet-label value="Caracteristicas" />
                <textarea class="form-control w-full" wire:model.defer="caracteristicas"></textarea>

                <x-jet-input-error for='caracteristicas' />

            </div>

            <div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                <input type="file" wire:model="image" id="{{ $identificador }}">
                <x-jet-input-error for='image' />
            </div>

        </x-slot>
        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image"
                class="disabled.opacity-25">
                Guardar
            </x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>

</div>
