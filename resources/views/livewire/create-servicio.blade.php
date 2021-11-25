<div>
    <button class="p-2 pl-5 pr-5 bg-green-500 text-gray-100 text-lg rounded-lg" wire:click="create()">
        Crear Nuevo Servicio
    </button>

    <x-jet-dialog-modal wire:model="isModal">
        <x-slot name="title">
            CREAR/EDITAR SERVICIO
        </x-slot>

        <x-slot name="content">
            {{-- IMAGENURL --}}
            {{-- @if ($imagenurl)
                <img src="{{ $imagenurl->temporaryUrl() }}" alt="" class="mb-4">
            @endif
            <div> --}}
            {{-- <x-jet-label value="Imagen del Servicio" /> --}}
            {{-- <x-jet-input type="file" wire:model='imagenurl' />
                <x-jet-input-error for='imagenurl' />
            </div> --}}
            {{-- NOMBRE --}}
            <div class="mb-4">
                <x-jet-label value="Nombre del Servicio" />
                <x-jet-input type="text" class="w-full" wire:model.defer="nombre" />
                <x-jet-input-error for='nombre' />
            </div>
            {{-- DESCRIPCION --}}
            <div class="mb-4">
                <x-jet-label value="Descripcion del Servicio" />
                <textarea class="form-control w-full" wire:model.defer="descripcion"></textarea>
                <x-jet-input-error for='descripcion' />
            </div>
            {{-- COSTO --}}
            <div class="mb-4">
                <x-jet-label value="Costo del servicio" />
                <x-jet-input type="number" class="w-full" wire:model.defer="costo" />
                <x-jet-input-error for='costo' />
            </div>
            {{-- IMAGENURL --}}
            <div class="mb-4">
                <x-jet-label value="URL de la imagen" />
                <x-jet-input type="text" class="w-full" wire:model.defer="imagenurl" />
                <x-jet-input-error for='imagenurl' />
            </div>
            {{-- STATUS --}}
            <div class="mb-4">
                <x-jet-label value="Estado: Activado o Desactivado" />
                <select class="mr-4 form-control" wire:model.defer="status">
                    <option value=true>Activado</option>
                    <option value=false>Desactivado</option>
                </select>
                <x-jet-input-error for='status' />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeModal()">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="store()" class="disabled.opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
