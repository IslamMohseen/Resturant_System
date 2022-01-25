<x-app-layout>
    
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')

  </head>
  <body>
    <div class="container-scroller">

    @include('admin.navbar')
        
    <div class="container" style="padding: 40px">

    <form action="{{url('/search')}}" method="get">
        @csrf
    <input type="text" name="search" style="color:black">

    <input type="submit" value="Search" class="btn btn-success">

    </form>

    <div class="container" style="padding:2%">
        <table class="table" style="color: white">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Foodname</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total Price</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)    
            <tr>
              <td>{{$order->name}}</td>
              <td>{{$order->phone}}</td>
              <td>{{$order->address}}</td>
              <td>{{$order->foodname}}</td>
              <td>{{$order->price}}</td>
              <td>{{$order->quantaty}}</td>
              <td>{{$order->price * $order->quantaty}}</td>
            </tr>
          @endforeach
    
          </tbody>
        </table>
    </div>
</div>

    @include('admin.adminscript')
    </div>
  </body>
</html>