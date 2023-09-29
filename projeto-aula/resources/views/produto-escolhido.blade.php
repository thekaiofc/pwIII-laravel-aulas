<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

       @foreach($produtos as $p)
       <h1> {{$p->idProduto}} </h1> 
       <h1> {{$p->produto}} </h1> 
       <h1> {{$p->valor}} </h1> 
       @endforeach

    
</body>
</html>