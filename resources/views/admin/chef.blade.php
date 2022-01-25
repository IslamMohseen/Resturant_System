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
        <h1>Add a New Chef</h1>
        <hr>
        <form action="{{url('uploadchef')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name :</label>
            <input style="color: white" type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Speciality :</label>
            <input style="color: white" type="text" name="speciality" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image :</label>
            <input type="file" name="image" class="form-control" required>
          </div>
          
          <button type="submit" class="btn btn-success">Add Chef</button>
        </form>
        <hr>
      </div>

      <div class="container" style="padding:2%">
        <table class="table" style="color: white">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Speciality</th>
              <th scope="col">Image</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($chefs as $chef)    
            <tr>
              <td>{{$chef->name}}</td>
              <td>{{$chef->speciality}}</td>
              <td><img height="200px" width="200px" src="/chefimage/{{$chef->image}}"></td>
              <td><a class="btn btn-danger" href="{{url('deletechef' , $chef->id )}}">Delete</a></td>
              <td><a class="btn btn-success" href="{{url('editchef' , $chef->id )}}">Update</a></td>
            </tr>
          @endforeach
    
          </tbody>
        </table>
      </div>
    </div>

        @include('admin.adminscript')

  </body>
</html>