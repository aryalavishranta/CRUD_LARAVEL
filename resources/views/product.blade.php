<html>
    <head>
         <title>Product list</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
  @if(session('success'))
  <div class ="alert alert-success">
    {{session('success')}}
  </div>
  @endif
    <h1 class="text text-center">Products</h1>
    <a href="http://127.0.0.1:8000/create"><button class="btn btn-primary">Add Product</button></a>
    <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Product`s Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($product as $product)
              <tr>
                <th>{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="{{url('/edit/'.$product->id)}}"><button>Edit</button></a>
                    <a href="{{url('/delete/'.$product->id)}}"><button>Delete</button></a>
                </td>    
            </tr>

              @endforeach
              
            </tbody>
          </table>
</body>
</html>