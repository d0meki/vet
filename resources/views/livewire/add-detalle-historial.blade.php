<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <button class="p-2 pl-5 pr-5 bg-green-500 text-gray-100 text-lg rounded-lg" wire:click="create()">
        Crear Nuevo Servicio
    </button>

    <x-jet-dialog-modal wire:model="isModal">
        <x-slot name="title">
            Crear/Editar Mascota
        </x-slot>

        <x-slot name="content">
            <div class="inline-flex items-center">
                {{-- TEMPERATURA --}}
                <div class="mb-4 mr-4">
                    <x-jet-label value="Temperatura °C" />
                    <x-jet-input type="number" class="w-full" wire:model.defer="temperatura" />
                    <x-jet-input-error for='temperatura' />
                </div>
                {{-- PESO --}}
                <div class="mb-4 ml-4">
                    <x-jet-label value="Peso (Gramos)" />
                    <x-jet-input type="number" class="w-full" wire:model.defer="peso" />
                    <x-jet-input-error for='peso' />
                </div>
            </div>
            {{-- SINTOMAS --}}
            <div class="mb-4">
                <x-jet-label value="Sintomas" />
                <textarea class="form-control w-full" wire:model.defer="sintomas"></textarea>
                <x-jet-input-error for='sintomas' />
            </div>
            {{-- DIAGNOSTICO --}}
            <div class="mb-4">
                <x-jet-label value="Diagnostico" />
                <textarea class="form-control w-full" wire:model.defer="diagnostico"></textarea>
                <x-jet-input-error for='diagnostico' />
            </div>
            {{-- SERVICIOS --}}
            <div>
                <x-jet-label value="Servicio realizado" />
                <select class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none"
                wire:model.defer="servicio_id">
                 <option value="Servicio">Seleccione Servicio</option>
                @foreach ($servicios as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                @endforeach
                </select>
                {{ $this->mascota_id }}
                <br>
                {{ $this->servicio_id  }}
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
