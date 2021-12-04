<div>
    <x-jet-danger-button wire:click="$set('open',true)">
        Crear Jaula
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nueva Jaula
        </x-slot>

        <x-slot name="content">
            <div wire:loading wire:target="image"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen Cargando!</strong>
                <span class="block sm:inline">Espere un momento por favor.</span>
            </div>

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}">
            @endif

            <div class="mb-4">
                <x-jet-label value="Nombre de la jaula" />
                <x-jet-input type="text" class="w-full" wire:model="nombre" />
                <x-jet-input-error for="nombre" />
            </div>


            <div class="mb-4" wire:ignore>
                <x-jet-label value="Descripcion de la Jaula" />
                <x-jet-input id="editor" wire:model="descripcion" type="text" class="w-full" />
                <x-jet-input-error for="descripcion" />
            </div>

            <div>

                <input type="file" wire:model="image" id="{{ $identificador }}">
                <x-jet-input-error for="nombre" />
            </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open',false)">
                cancelar
                </x-jet-secondary-buttom>

                <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image"
                    class="disabled:opacity-25">
                    crear Jaula
                    </x-jet-danger-buttom>

                    <span wire:loading.flex wire:target="save">Cargando..</span>
        </x-slot>

    </x-jet-dialog-modal>
    @push('js')
        script src="<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(function(editor) {
                    editor.model.document.on('change:data', () => {
                        @this.set('descripcion', editor.getData());
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
</div>
