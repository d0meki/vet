<x-slot name="header">
    <h1 class="text-gray-900">RECETAS </h1>
</x-slot>



<div class="py-12">
    <div class="max-w-7xl mx-auto sm-px6 lg:px-8">
       <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

       @if (session()->has('message'))
         <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <h4>{{ session('messaje')}}</h4>
                    </div>
                </div>
         </div>
       @endif

       <button wire:click="crear()" class="bg-red-500 bg-red-600 text-white fond-bold py-2 px-4 my-3"> Nuevo</button>           

       @if($modal)
           @include('livewire.create')
        @endif

       <table  class="table-fixed w-full">
            <thead >
            <tr>
                <tr class="bg-indigo-600 text-white">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">FECHA</th>
                <th class="px-4 py-2">NOMBRE MEDICAMENTO</th>
                <th class="px-4 py-2">DOSIS</th>
                <th class="px-4 py-2">ID SERVICIO</th>
                <th class="px-4 py-2">ACCIONES</th>

            </tr>
            </thead>

<tbody>
@foreach($recetas as $receta)
        <tr>
          <td class="border px-4 py-2">{{$receta->id}}</td>
          <td class="border px-4 py-2">{{$receta->fecha}}</td>
          <td class="border px-4 py-2">{{$receta->nombre_medicamento}}</td>
          <td class="border px-4 py-2">{{$receta->dosis}}</td>
          <td class="border px-4 py-2">{{$receta->id_servicio}}</td>
          <td class="border px-4 py-2 text-center">
              <button wire:click="editar({{$receta->id}})" class="bg-red-500 bg-red-600 text-white fond-bold py-2 px-4">Editar</button>
              <button wire:click="borrar({{$receta->id}})" class="bg-red-500 bg-red-600 text-white fond-bold py-2 px-4">Borrar</button>
          </td>

        </tr>
        @endforeach
</tbody>
</table>

       
       </div>


    </div>
</div>
