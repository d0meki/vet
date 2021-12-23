<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 8 PDF</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>Receta</h2>
            </div>
          
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <caption>Lista de medicamentos</caption>
                    <thead>
                      <tr>
                        <th scope="col">fecha</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">dosis</th>
                        <th scope="col">servicio id</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($recetas as $receta)
                        <tr>
                            
                            <td>{{ $receta->created_at }}</td>
                            <td>{{ $receta->nombre_medicamento }}</td>
                            <td>{{ $receta->dosis }}</td>
                            <td>{{ $receta->servicio_id }}</td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>