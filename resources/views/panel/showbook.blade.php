@include('layout.navuser')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('cssfile/cateshow.css')}}">
    <title>Show Books</title>
</head>
<body>
    <p class="style-cate-title">{{$Category->category}}</p>
  @foreach($Books as $Book)
  @if ($Book->category_id===$Category->id)
  <div class="card-book">
  <p class="title">Name of the book : {{$Book->title}}</p> 
  <p class="author">Nmae of the author : {{$Book->author}}</p>
  <br>
  <h6>Description of the book : </h6>
  <p class="des">{{$Book->description}}</p> 
  <form action="{{route('cart.add',$Book->book_id)}}" method="POST">
    @csrf
    <button>Add to cart</button>
    <input type="hidden" name="book_id" value="{{$Book->book_id}}">
  @endif

  </div>
  @endforeach
    </div>


        
</body>
</html>