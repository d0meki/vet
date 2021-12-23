<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    {{-- <h1>Este es el componente "AddHistorial"</h1> --}}
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{__('Añadir Detalle Historial')}}
        </h2>
    </x-slot>
    <x-centerLayout_gary>
        <x-select_gary>
            {{-- <select class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none"
                wire:model="servicio_id">
                <option>Elija un servicio</option>
                @foreach ($servicios as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                @endforeach
            </select> --}}
            <select class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none"
                wire:model="mascota_id">
                <option value=0>Elija una mascota</option>
                @foreach ($mascotas as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                @endforeach
            </select>
           {{--  {{ $this->mascotas }} --}}

            @include('livewire.add-detalle-historial')

        </x-select_gary>

        <x-table_gary>
            @if ($detallehistorial->isEmpty())
                <div class="px-6 py-4">
                    <h1>NO SE CUENTA CON REGISTROS</h1>
                </div>
            @else
                <thead class="block md:table-header-group">
                    <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                      <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">#ID</th>
                      <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Temperatura °C</th>
                      <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Peso Gramos</th>
                      <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Sintomas</th>
                      <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Diagnostico</th>
                      <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Servicio:</th>
                      <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Creación:</th>
                      <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Modificación:</th>
                      <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Acciones:</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    @foreach ($detallehistorial as $item)
                      <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">#ID</span>{{$item->id}}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">#ID</span>{{$item->temperatura_cent}}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">#ID</span>{{$item->peso_gramos}}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">#ID</span>{{$item->sintomas}}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">#ID</span>{{$item->diagnostico}}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">#ID</span>{{$item->servicio_id}}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Creación:</span>{{$item->created_at}}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Modificación:</span>{{$item->updated_at}}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Actions</span>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded" wire:click="edit({{ $item->id }})">
                                Editar
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded" wire:click="delete({{ $item->id }})">
                                Eliminar
                            </button>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            @endif            
        </x-table_gary>

    </x-centerLayout_gary>
    
</div>
