<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <x-jet-danger-button wire:click="$set('open',true)" title="Mostrar Detalle">
        <i class="fas fa-eye"></i>
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Detalle
        </x-slot>

        <x-slot name="content">
           
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
            
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>{{-- wire:click="order('id')" --}}
                                <th scope="col"
                                    class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID FACTURA
                                </th>
                                <th scope="col"
                                    class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID SERVICIO
                                </th>
                                <th scope="col"
                                    class=" cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    PRECIO
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($detalles as $item)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $item->id }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $item->factura_id }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $item->servicio_id }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $item->precio}}  Bs</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
               
            </div>
        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open',false)">
                cancelar
            </x-jet-secondary-button>


        </x-slot>
    </x-jet-dialog-modal>


</div>
