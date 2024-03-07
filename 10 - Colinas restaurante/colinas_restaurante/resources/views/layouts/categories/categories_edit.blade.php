<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Editing category</h1>
    <form method="POST" action="{{route('update_category',$category->id)}}">
        @method('put')
        @csrf
        <label>name</label>
        <input type="text" name="nombre_categoria" value="{{$category->nombre_categoria}}">
        <label>description</label>
        <input type="text" name="descripcion_categoria" value="{{$category->descripcion_categoria}}">
        <input type="submit" value="UPDATE">
    </form>
</body>
</html>