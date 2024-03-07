<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button><a href="{{route('form_category')}}">Create Category</a></button>

    <table>
        <thead>
            <tr>
                <th>NAME</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td>
                    <a href="{{route('show_category',$category->id)}}">{{$category->nombre_categoria}}</a>
                </td>
                <td>
                    <button><a href="{{route('edit_category',$category->id)}}">EDIT</a></button>
                </td>
                <td>
                    <form method="POST" action="{{route('delete_category',$category->id)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit"><a>DELETE</a></button>
                    </form>
                </td>
            </tr>
            @empty
                <h1>No hay categorias registradas aún</h1>
            @endempty
        </tbody>
    </table>
</body>
</html>