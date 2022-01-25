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

      <div class="container" style="padding-left:6%">
        <h1>Add a New Food</h1>
        <hr>
        <form action="{{url('uploadfood')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name :</label>
            <input style="color: white" type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price :</label>
            <input style="color: white" type="text" name="price" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image :</label>
            <input type="file" name="image" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <input style="color: white" type="text" name="description" class="form-control" required>
          </div>
          
          <button type="submit" class="btn btn-success">Add</button>
        </form>
        <hr>
      </div>

      <div class="container" style="padding:2%">
        <table class="table" style="color: white">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Description</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($foods as $food)    
            <tr>
              <td>{{$food->title}}</td>
              <td>${{$food->price}}</td>
              <td>{{$food->description}}</td>
              <td><img height="200px" width="200px" src="/foodimage/{{$food->image}}"></td>
              <td><a class="btn btn-danger" href="{{url('deletefood' , $food->id )}}">Delete</a></td>
              <td><a class="btn btn-success" href="{{url('editfood' , $food->id )}}">Update</a></td>
            </tr>
          @endforeach
    
          </tbody>
        </table>
      </div>
    </div>

        @include('admin.adminscript')

  </body>
</html>