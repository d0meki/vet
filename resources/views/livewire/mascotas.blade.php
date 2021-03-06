<div>
    @livewire('create-mascota')
    @foreach ($mascotas as $item)
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>
            <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
                <div class="w-full bg-white rounded-lg sahdow-lg overflow-hidden flex flex-col md:flex-row">
                    @if ($item->image!=null)
                    <div class="mt-2" x-show="! photoPreview">
                        {{-- <img class="h-8 w-8 rounded-full object-cover"
                            src="/storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}">
                        </div> --}}    
                        <div class="w-full md:w-2/5 h-80">
                            <img class="object-center object-cover w-full h-full" src="/storage/{{ $item->image }}"
                                alt="photo">
                            {{-- <p>/storage/{{ $item->image }}</p> --}}
                        </div>
                    
                    @else
                   {{--  <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover"> --}}
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="https://freepikpsd.com/file/2019/10/dog-shadow-png-1-Transparent-Images.png" class="rounded-full h-20 w-20 object-cover">
                    </div>
                    
                    @endif
                    
                    <div class="w-full md:w-3/5 text-left p-6 md:p-4 space-y-2">
                        <p class="text-xl text-gray-700 font-bold"><strong>Nombre: </strong> {{ $item->nombre }}</p>
                        <p class="text-base text-gray-400 font-normal"><strong>Tipo: </strong>{{ $item->tipo }}</p>
                        <p class="text-base text-gray-400 font-normal"><strong>Raza: </strong>{{ $item->raza }}</p>
                        <p class="text-base text-gray-400 font-normal"><strong>Sexo: </strong>{{ $item->sexo }}</p>
                        <p class="text-base leading-relaxed text-gray-500 font-normal"><strong>Caracteristicas:
                            </strong>{{ $item->caracteristicas }}</p>
                        <x-jet-danger-button wire:click="$emit('deleteMascota',{{ $item->id }})">
                            Eliminar
                        </x-jet-danger-button>
                        <a class="btn btn-red mr-4 float-right" href="{{ URL::to('/historial', $item->id) }}"
                            target="_blank">
                            Generar Historial Medico
                        </a>
                        <a class="btn btn-red mr-4 float-right" href="{{ URL::to('/carnet', $item->id) }}"
                            target="_blank">
                            Generar Carnet de Vacunaci??n
                        </a>
                    </div>
                </div>
            </section>
        </x-jet-authentication-card>
    @endforeach
    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script>
            Livewire.on('deleteMascota', mascotaId => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('mascotas', 'delete', mascotaId)

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush

</div>
