<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <x-slot name='header'>
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('Vacunas') }}
        </h2>
    </x-slot>

    {{-- {{ $listavacuna }} --}}

    <x-centerLayout_gary>

        <x-select_gary>
            <select
                class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none"
                wire:model="mascota_id">
                <option value=0>Elija una mascota</option>
                @foreach ($mascotas as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>

            <a class="btn btn-primary" href="{{ URL::to('/imprimir', $mascota_id) }}">Export to PDF</a>


            {{-- <button class="p-2 pl-5 pr-5 bg-green-500 text-gray-100 text-lg rounded-lg"
                onclick="{{ route('ver.carnet') }}">
                Generar Carnet de Vacunación
            </button> --}}

        </x-select_gary>

        <x-table_gary>
            @if ($listavacuna->isEmpty())
                <div class="px-6 py-4">
                    <h1>NO EXISTE VACUNAS REGISTRADAS PARA DICHA MASCOTA</h1>
                </div>
            @else
                <thead class="block md:table-header-group">
                    <tr
                        class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Nombre</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            # Serie</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Tipo</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Servicio ID</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Fecha de vacunación:</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    @foreach ($listavacuna as $item)
                        <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">
                                    Nombre
                                </span>
                                {{ $item->nombre }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">
                                    # Serie
                                </span>
                                {{ $item->numserie }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">
                                    Tipo
                                </span>
                                {{ $item->tipo }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">
                                    Servicio ID
                                </span>
                                {{ $item->nombre_servicio }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <span class="inline-block w-1/3 md:hidden font-bold">
                                    Fecha de Vacunación
                                </span>
                                {{ $item->created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endif
        </x-table_gary>
    </x-centerLayout_gary>
    <h1>Componente que listara las vacunas según las mascotas</h1>
</div>
