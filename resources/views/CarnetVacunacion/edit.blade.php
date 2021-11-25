{{-- @extends ('enlacedelDashboard') --}}
<div>
    <p1>Formulario de edicion</p1>
    <form action="{{route('CarnetVacunacion.update',[$CV->id])}}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <textarea type="text" name="descripcion"  value="{{ $CV->descripcion }}" placeholder="Descripcion" ></textarea>    
        </p>   
        <p>
            <input type="text" name="fecha_vacuna" placeholder="fecha de vacunacion" value="{{ $CV->fecha_vacuna}}">       
        </p>    
        <p>
            <input type="text" name="fecha_proxima" placeholder="fecha proxima" value="{{ $CV->fecha_vacuna}}">       
        </p>
        <input type="submit" value="Editar">    
    </form>
</div>