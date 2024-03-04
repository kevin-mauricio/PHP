<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container bg-light p-5">
        <div class="row bg-dark p-2">
            <div class="col">
                <button class="btn btn-light">
                    <a class="nav-link" href="{{route('create')}}">Crear nueva ruta</a>
                </button>
            </div>

        </div>
        <div class="row">
            <h1>Listado</h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">title</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($notes as $note)
                    <tr>
                        <th scope="row"><a class="nav-link" href="{{route('show',$note->id)}}">{{$note->title}}</a></th>
                        <td>
                            <button class="btn btn-dark">
                                <a class="nav-link" href="{{route('edit',$note->id)}}">EDIT</a>
                            </button>
                        </td>
                        <td>
                            <form method="POST" action="{{route('destroy', $note->id)}}">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <div class="col col-auto">
                                        <input class="form-control" type="submit" value="DELETE">
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <h1>Lista vacia</h1>
                    @endforelse

                </tbody>
              </table>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>