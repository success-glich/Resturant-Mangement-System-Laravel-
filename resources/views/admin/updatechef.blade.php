<x-app-layout>
    
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
@include("admin.admincss")
  </head>
  <body>
  <div class="container-scroller">
  @include("admin.navbar")
  <div style="position:relative; top:60px; right:-150px;">
  <form action="{{url('/updatefoodchef',$data->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      <div>
        <label for="">Name</label>
        <input style="color:blue" type="text" name="name"  value ="{{$data->name}}"  require>
      </div>
      <div>
        <label for="">Speciality</label>
        <input style="color:blue" type="text" name="speciality" id=" " value ="{{$data->speciality}}" placeholder="Enter Speciality" require>
      </div>
      <div>
        <label for="">Old Image</label>
        <!-- <input type="file" name="image" require> -->
        <img src="chefimage/{{$data->image}}" wiidh="200" height="200" alt="">
      </div>
      <div>
        <label for="">New  Image</label>
        <input type="file" name="image" >
      </div>
      <div>
        <input style="color:blue; background-color:white;" type="Submit" value="Save" id=" " require>
      </div>

    </form>
  
            <br>
</div>
  </div>
   
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include("admin.adminscript")
  </body>
</html>