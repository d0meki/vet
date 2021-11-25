<div>
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p.0">
        <div class="fixed insert-0 transition-opacity">
            <div class="absolute insert-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:incline-block sm:align-middle sm:h-screen"></span>

        <div clas="incline-block align-botton bg-white rounded-lg text-left overflow-hidden shadow-x1 transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <label for="fecha">Fecha:</label>
                    <input type="text"
                        class="shadow apperance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="fecha" wire:model="fecha">
                </div>

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <label for="nombre_medicamento">Nombre Medicamento:</label>
                    <input type="text"
                        class="shadow apperance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="nombre_medicamento" wire:model="nombre_medicamento">
                </div>

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <label for="dosis">Dosis:</label>
                    <input type="text"
                        class="shadow apperance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="dosis" wire:model="dosis">
                </div>

                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <label for="id_servicio">Id Servicio:</label>
                    <input type="text"
                        class="shadow apperance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="id_servicio" wire:model="id_servicio">
                </div>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 flex items-center">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="guardar()" type="button"
                            class="incline-flex justify-center w-full rounded-md border-transparent px-4 py-2 bg-gray-500 focus:outline-none focus:border-gray-800 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
                    </span>
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="cerrarModal()" type="button"
                            class="incline-flex justify-center w-full rounded-md border-transparent px-4 py-2 bg-gray-500 focus:outline-none focus:border-gray-800 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>

                    </span>
                </div>





            </form>
        </div>

    </div>
</div>
