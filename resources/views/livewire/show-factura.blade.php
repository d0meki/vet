<div>{{-- wire:init="loadPage" --}}
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8  py-4">

        @livewire('create-factura')


        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        FECHA
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        NOMBRE
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        MONTO TOTAL
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        METODO PAGO
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Add
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Show
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Print
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($facturas as $factura)
                                    <tr>
                                        <td class="px-6 py-4 ">
                                            <div class="text-sm text-gray-900">
                                                {{ $factura->id }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <div class="text-sm text-gray-900">
                                                {{ $factura->fecha }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <div class="text-sm text-gray-900">
                                                {{ $factura->nombre }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <div class="text-sm text-gray-900">
                                                {{ $factura->total }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <div class="text-sm text-gray-900">
                                                {{ $factura->MetodoPago->nombre }}
                                            </div>
                                        </td>

                                        {{-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td> --}}
                                        <td class="px-6 py-4 ">

                                            <div class="text-sm text-gray-900">
                                                @livewire('create-detalle',['factura' => $factura],key($factura->id))
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <div class="text-sm text-gray-900">
                                                @livewire('show-detalle',['factura' => $factura],key($factura->id))
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 ">
                                            <a class="btn btn-red" href="{{ route('ver.factura', $factura->id)}}" title="Imprimir">
                                                <i class="fas fa-print"></i>
                                            </a>
                                           
                                        </td>
                                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                                           
                                        
                                            
                                        </td> --}}

                                    </tr>
                                @endforeach

                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>





</div>
