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
        <h1>Add a New Chef</h1>
        <hr>
        <form action="{{url('updatechef',$chefs->id)}}" method="POST" enctype="multipart/form-data">
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
            <label for="image" class="form-label">Old Image :</label>
            <img width="200" height="200" src="/chefimage/{{$chefs->image}}">
            </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image :</label>
            <input type="file" name="image" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-success">Update Chef</button>
        </form>
        <hr>
      </div>
    </div>

        @include('admin.adminscript')

  </body>
</html>