<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    @forelse($products as $product)
    <div>
        <h3>{{$product->name}}</h3>
        <p>{{$product->short_description}}</p>
        <p>{{$product->price}} USD</p>
    </div>
    @empty
        <h5>No hay datos</h5>
    @endforelse
</body>
</html>