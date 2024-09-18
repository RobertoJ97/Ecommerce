<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<center>
       <img  height="250" width="250" src="" >
       <h3>Costumer Name: {{ $data->name }}</h3>
       <h3>Costumer Name: {{ $data->rec_address }}</h3>
       <h3>Costumer Name: {{ $data->email }}</h3>
       <h3>Costumer Name: {{ $data->phone }}</h3>
       <h3>Costumer Name: {{ $data->product->name }}</h3>
       <h3>Costumer Name: {{ $data->product->price }}</h3>
       <img src="product/{{ $data->product->image }}" alt="">
</center>
</body>
</html>
