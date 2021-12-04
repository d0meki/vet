<div>
    {{-- The Master doesn't talk, he acts. --}}
    <x-jet-danger-button wire:click="$set('open',true)">
        CREAR USUARIO
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            CREAR NUEVO USUARIO
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre Completo" />
                <x-jet-input type="text" class="w-full" wire:model.defer="name" />

                <x-jet-input-error for='name' />
                @error('name')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Telefono" />
                <x-jet-input type="text" class="w-full" wire:model.defer="phone" />

                <x-jet-input-error for='phone' />
                @error('phone')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Direccion" />
                <x-jet-input type="text" class="w-full" wire:model.defer="address" />

                <x-jet-input-error for='address' />
                @error('address')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <x-jet-label for="email" value="Correo" />
                <x-jet-input type="text" class="w-full block mt-1" type="email" wire:model.defer="email" required />

                <x-jet-input-error for='email' />
                @error('email')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <x-jet-label value="Contraseña" />
                <x-jet-input type="text" class="block mt-1 w-full" type="password" wire:model.defer="password"
                    required />

                <x-jet-input-error for='password' />
                @error('password')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="px-6 py-4 flex items-center">
                <div class="flex items-center">
                    <span>ROL</span>
                    <select wire:model="rol" class="mr-4 ml-4 form-control">
                        <option value="null">Selecciones un Rol</option>
                        <option value="empleado">veterinario</option>
                        <option value="adm">administrador</option>
                    </select>
                </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">
                cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button class="disabled.opacity-25" wire:click="save" wire:loading.attr="disabled"
                wire:target="save">
                crear usuario
            </x-jet-danger-button>
            <span wire:loading wire:target="save">
                Cargando..
            </span>
        </x-slot>

    </x-jet-dialog-modal>
  
</div>
