<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{route('store')}}">
        @csrf {{-- directiva para enviar la información --}}
        <label>Title:</label>
        <input type="text" name="title">
        <label>Description:</label>
        <input type="text" name="description">
        
        <input type="submit" value="create">
    </form>
</body>
</html>