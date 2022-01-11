<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}



    <x-jet-danger-button wire:click="$set('open',true)" title="Agregar Detalle">
        <i class="fas fa-edit"></i>
    </x-jet-danger-button>
   

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            DETALLE
        </x-slot>

        <x-slot name="content">
            <div class="mb-4 ">
                <x-jet-label value="ID FACTURA" />
                <x-jet-input type="text" wire:model="facturaid" disabled />{{--  --}}

            </div>

            <div class="mb-4">
                <x-jet-label value="Servicios" />
                <select class="mr-4 ml-4 form-control" wire:model="servicioid">
                    <option>Seleccione un metodo de pago</option>
                    @foreach ($servicio as $item)
                        <option>{{ $item->nombre }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for='servicioid' />
                @error('servicioid')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open',false)">
                terminar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save">
                agregar
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>

</div>
