{{-- @extends (PonerEnlacedeldashboard) --}}
<div>
    <style>
        .active{
            text-decoration: none;
            color: green;
        }
        .error{
            color: red;
        }
    </style>
    <h1>Formulario de registro de Carnet de Vacunacion</h1>
    @if( session()->has('info'))
        <h1>{{ session('info') }}</h1>
    @else
        <form action="{{route('CarnetVacunacion.store')}}" method="POST">
            @csrf
            <p>
                <textarea type="text" name="descripcion" placeholder="Descripcion" ></textarea>
                
            </p>
            <p>
                <input type="date" name="fecha_vacuna" placeholder="fecha de vacuna" >
                
            </p>
            <p>
                <input type="date" name="fecha_proxima" placeholder="fecha proxima" value="{{ old('nombre') }}">
    
            </p>
            <input type="submit" value="Guardar Registro">
    @endif
    </form>
</div>

