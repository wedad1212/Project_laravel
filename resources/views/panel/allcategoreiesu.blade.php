@include('layout.navuser')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('cssfile/cateshow.css')}}">
    <title>Categories</title>
</head>
<body>
    <p class="main-text"> Categories</p>
    <div calss="card-list">
@foreach ($categoreies as $category)

<div class="card">
    <div class="card-title">
        <p>{{$category->category}}</p>
        <form action="{{route('get.books',$category->id)}}" method="Get">
        <input type="submit" value="shwo books" value="{{$category->id}}" name="show">
        <br>
    </div>
</div>

@endforeach
</div>
</body>
</html>