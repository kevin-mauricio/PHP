<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Category</title>
</head>
<body>
    <h1>Create Category</h1>
    <form method="POST" action="{{route('store_category')}}">
        @csrf {{-- directiva para enviar la información --}}
        <label>name</label>
        <input type="text" name="nombre_categoria">
        <label>description</label>
        <input type="text" name="descripcion_categoria">
        <input type="submit" value="CREATE">
    </form>
</body>
</html>