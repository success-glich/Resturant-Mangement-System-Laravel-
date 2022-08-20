<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
  @include("admin.admincss")
</head>

<body>
  <div class="container-scroller">
    @include("admin.navbar")
    <form action="{{url('/uploadchef')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div>
        <label for="">Name</label>
        <input style="color:blue" type="text" name="name" id=" " placeholder="Enter name" require>
      </div>
      <div>
        <label for="">Speciality</label>
        <input style="color:blue" type="text" name="speciality" id=" " placeholder="Enter Speciality" require>
      </div>
      <div>
        <label for="">Speciality</label>
        <input type="file" name="image" require>
      </div>
      <div>
        <input style="color:blue; background-color:white;" type="Submit" value="Save" id=" " require>
      </div>

    </form>
    <br>
    <br>

    <div>
      <table bgcolor="black">
        <tr>
          <th style="padding:30px;">Chef Name</th>
          <th style="padding:30px;">Speciality</th>
          <th style="padding:30px;">Image</th>
          <th style="padding:30px;">Action</th>
          <th style="padding:30px;">Action</th>
        </tr>
        @foreach($data as $data)

        <tr style="text-align:center;">
          <td>{{$data->name}}</td>
          <td>{{$data->speciality}}</td>
          <td> <img src="/chefimage/{{$data->image}}" height="200" width="200"></td>
          <td><a href="{{url('/deletechef',$data->id)}}">Delete</a>
          </td>
          <td><a href="{{url('/updatechef',$data->id)}}">Update</a></td>
        </tr>
        @endforeach
      </table>
    </div>


  </div>




  <!-- container-scroller -->
  <!-- plugins:js -->
  @include("admin.adminscript")
</body>

</html>