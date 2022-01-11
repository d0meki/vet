<div>


    <x-jet-danger-button wire:click="$set('open',true)" class="mb-4 mx-4 ml-8 mr-8"    >
        NUEVA FACTURA
    </x-jet-danger-button>
    

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            CREAR NUEVA FACTURA
        </x-slot>

        <x-slot name="content">
            <div class="mb-4 ">
                <x-jet-label value="FECHA" />
                <x-jet-input type="text" wire:model.defer="fecha" />

            </div>

            <div class="mb-4">
                <x-jet-label value="NIT" />
                <x-jet-input type="text" wire:model.defer="nit" />
            </div>

            <div class="mb-4">
                <x-jet-label value="NOMBRE" />
                <x-jet-input type="text" wire:model.defer="nombre" class="w-full" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Servicios" />
                <select class="mr-4 ml-4 form-control" wire:model="metodop">
                    <option>Seleccione un metodo de pago</option>
                    @foreach ($pago as $item)
                        <option>{{ $item->nombre }}</option>
                    @endforeach

                </select>
           
                <x-jet-input-error for='metodop' />
                @error('metodop')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open',false)">
                cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save">
                guardar
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>

</div>
