{{-- @extends ('DeDashboardponerenlace') --}}
<div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <h3>Todos los Carnets </h3>
                    <a href="{{ route('CarnetVacunacion.create') }}"><button class="btn btn-success">Nuevo</button></a>
                    <table style="width: 100%" border="1">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Descripcion</th>
                                    <th>Fecha Vacuna</th>
                                    <th>Fecha Proxima</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($CVacunacion as $CV)
                                    <tr>
                                        <td>{{ $CV->id }}</td>
                                        <td>{{ $CV->descripcion }}</td>
                                        <td>{{ $CV->fecha_vacuna }}</td>
                                        <td>{{ $CV->fecha_proxima }}</td>
                                        <td>
                                            <a href="{{ route('CarnetVacunacion.show', [$CV->id]) }}">Ver</a>
                                            <a href="{{ route('CarnetVacunacion.edit', [$CV->id]) }}"><button
                                                    class="btn btn-info">Editar</button></a>


                                            <form action="{{ route('CarnetVacunacion.destroy', [$CV->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </table>
            </div>
        </div>
    </div>

</div>
