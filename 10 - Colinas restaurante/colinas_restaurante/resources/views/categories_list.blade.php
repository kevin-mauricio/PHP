<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @forelse($categories as $category)
        <a href="{{route('categories',$category->id)}}">{{$category->nombre_categoria}}</a>
    @empty
        <h1>No hay categorias registradas aún</h1>
    @endempty
</body>
</html>