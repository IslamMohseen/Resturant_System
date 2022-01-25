<x-app-layout>
    
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
        @include('admin.admincss')

  </head>
  <body>
    <div class="container-scroller">
        @include('admin.navbar')

      <div class="container" style="padding-left:6%">
        <h1>Update Food</h1>
        <hr>
        <form action="{{url('/updatefood',$foods->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name :</label>
            <input style="color: white" type="text" name="name" class="form-control" value="{{$foods->title}}" >
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price :</label>
            <input style="color: white" type="text" name="price" class="form-control" value="{{$foods->price}}">
          </div>
          <div class="mb-3">
            <label class="form-label">OldImage :</label>
            <img height="200px" width="200px" src="/foodimage/{{$foods->image}}">          
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image :</label>
            <input type="file" name="image" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <input style="color: white" type="text" name="description" class="form-control" value="{{$foods->description}}">
          </div>
          
          <button type="submit" class="btn btn-success">Update</button>
        </form>
        <hr>
      </div>

      
    </div>

        @include('admin.adminscript')

  </body>
</html>