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

      <div class="container" style="padding:2%">
        <table class="table" style="color: white">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">date</th>
              <th scope="col">time</th>
              <th scope="col">message</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reservations as $reservation)    
            <tr>
              <td>{{$reservation->name}}</td>
              <td>{{$reservation->email}}</td>
              <td>{{$reservation->phone}}</td>
              <td>{{$reservation->date}}</td>
              <td>{{$reservation->time}}</td>
              <td>{{$reservation->message}}</td>
            </tr>
          @endforeach
    
          </tbody>
        </table>
      </div>
    </div>

        @include('admin.adminscript')

  </body>
</html>