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
    
    <div class="container" style="padding:7%">
    <table class="table" style="color: white">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)    
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          @if ($user->usertype == '0')
          <td><a class="btn btn-danger" href="{{url('deleteuser' , $user->id )}}">Delete</a></td>
          @else
          <td><a class="btn btn-danger">Not Allowed</a></td>
          @endif
        
        </tr>
      @endforeach

      </tbody>
    </table>
  </div>
</div>
    </div>

    @include('admin.adminscript')

  </body>
</html>