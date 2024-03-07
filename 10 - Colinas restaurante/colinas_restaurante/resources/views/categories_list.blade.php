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
    @forelse($categories as $category)
    <ul>
        <li>
            <a href="{{-- {{route('show',$category->id)}} --}}">{{$category->nombre_categoria}}</a>
        </li>
    </ul>
    @empty
        <h1>No hay categorias registradas aún</h1>
    @endempty
</body>
</html>