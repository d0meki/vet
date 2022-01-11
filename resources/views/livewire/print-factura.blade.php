<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 8 PDF</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>Factura</h2>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="px-0">
                    {{-- @foreach ($recetas as $item)
                        <li class="border  list-none rounded-sm px-3 py-3">{{ $item->nombre_medicamento }} -
                            {{ $item->dosis }}
                        </li>
                    @endforeach --}}

                    <li class="border  list-none rounded-sm px-3 py-3">Id: {{ $factura[0]->id }}</li>
                    <li class="border  list-none rounded-sm px-3 py-3">Fecha: {{ $factura[0]->fecha }}</li>
                    <li class="border  list-none rounded-sm px-3 py-3">NIT: {{ $factura[0]->nit }}</li>
                    <li class="border  list-none rounded-sm px-3 py-3">Nombre: {{ $factura[0]->nombre }}</li>
                </ul>
                <table class="table">
                    <caption>Detalles</caption>
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Id Factura</th>
                            <th scope="col">Servicio</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $detalle)
                            <tr>

                                <td>{{ $detalle->id }}</td>
                                <td>{{ $detalle->factura_id }}</td>
                                <td>{{ $detalle->servicio->nombre }}</td>
                                <td>{{ $detalle->precio }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span class="float-right">Total: <strong>{{ $factura[0]->total }}</strong></span>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
