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
            <form action=" {{url('/update',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="">Title</label>
                    <input style="color:blue;" type="text" name="title" value ="{{$data->title}}" id="" placeholder="Write a title" required>
                </div>
                <br>
                <div>
                    <label for="">Price</label>
                    <input style="color:blue;" type="number" name="price" value="{{$data->price}}" id="" placeholder="Write a price" required>
                </div>
                <br>
                <div>
                    <label for="">old Image</label>
                    <img src="/foodimage/{{$data->image}}" alt="" height="200" width="200">
                </div>
                <br>
                <div>
                    <label for="">New Image</label>
                    <input style="color:blue;" type="file" name="image" id="" value="{{$data->title}}"  required>
                </div>
                <br>
                <div>
                    <label for="">Description</label>
                    <input style="color:blue;" type="text" name="description"value="{{$data->description}} " placeholder="Description" required>
                </div>
                <br>
                <div>
                    <input style="color:black; background-color:white;"  type="submit"  value ="save">
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