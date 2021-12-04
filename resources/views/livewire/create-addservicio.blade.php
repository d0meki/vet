<div wire:init="loadPage">
    {{-- The Master doesn't talk, he acts. --}}
    <x-jet-danger-button class="mb-4 mt-4 mx-4" wire:click="$set('open',true)">
        Agregar
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Datos Del Servicio brindado
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Descripcion Servicio" />
                <x-jet-input type="text" class="w-full" wire:model="nombre" />
                <x-jet-input-error for='nombre' />
                @error('nombre')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Personal que lo atendio" />
                <x-jet-input type="text" class="w-full" wire:model="personal" disabled />
                <x-jet-input-error for='personal' />
                @error('personal')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Tipo de Servicio" />
                {{-- <x-jet-input type="text" class="w-full" wire:model="tipo_id" /> --}}
                <select wire:model="tipo_servicio" class="mr-4 ml-4 form-control">
                    <option>Seleccione un servicio</option>
                    @foreach ($tipos as $item)
                        <option>{{ $item->nombre }}</option>
                    @endforeach
                    {{-- <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option> --}}
                </select>
                <x-jet-input-error for='tipo_servicio' />
                @error('tipo_servicio')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Cliente" />
                <x-jet-input type="text" class="w-full" wire:model="cliente" />
                @if (count($this->query))
                    @if ($this->cliente == '')
                        <span></span>
                    @else
                        @if ($this->cliente == $this->query[0]->name)
                            <span></span>
                        @else
                            <span>
                                {{ $this->query[0]->name }}
                            </span>
                        @endif
                    @endif
                @else
                    <span>No existen registros coinsidentes</span>
                @endif
                <x-jet-input-error for='user_id' />
                @error('user_id')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Lista de Jaulas" />
                {{-- <x-jet-input type="text" class="w-full" wire:model="tipo_id" /> --}}
                <select wire:model="jaula_nombre" class="mr-4 ml-4 form-control">
                    <option>Seleccione una Jaula</option>
                    @foreach ($jaulas as $item)
                        <option>{{ $item->nombre }}</option>
                    @endforeach
                    {{-- <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option> --}}
                </select>
                <x-jet-input-error for='jaula_nombre' />
                @error('jaula_nombre')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Costo" />
                <x-jet-input type="number" class="w-full" wire:model="costo" />
                <x-jet-input-error for='costo' />
                @error('costo')
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

            <x-jet-danger-button class="disabled.opacity-25" wire:click="save" wire:loading.attr="disabled"
            wire:target="save">
                guardar servicio
            </x-jet-danger-button>
            <span wire:loading wire:target="save">
                Cargando..
            </span>
        </x-slot>
    </x-jet-dialog-modal>

</div>
