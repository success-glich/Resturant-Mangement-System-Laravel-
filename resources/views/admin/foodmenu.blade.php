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
        <div style="position:relative; top:60px; right:-150px;">
            <form action=" {{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="">Title</label>
                    <input style="color:blue;" type="text" name="title" id="" placeholder="Write a title" required>
                </div>
                <br>
                <div>
                    <label for="">Price</label>
                    <input style="color:blue;" type="number" name="price" id="" placeholder="Write a price" required>
                </div>
                <br>
                <div>
                    <label for="">Image</label>
                    <input style="color:blue;" type="file" name="image" id=""  required>
                </div>
                <br>
                <div>
                    <label for="">Description</label>
                    <input style="color:blue;" type="text" name="description" id="" placeholder="Description" required>
                </div>
                <br>
                <div>
                    <input style="color:black; background-color:white;"  type="submit"  value ="save">
                </div>

            </form>
            <br>
        <div>
            <table bgcolor="black">
                <tr>
                    <th style="padding:30px;">Food Name</th>
                    <th style="padding:30px;">Price</th>
                    <th style="padding:30px;">Description</th>
                    <th style="padding:30px;">Image</th>
                    <th style="padding:30px;">Action</th>
                    <th style="padding:30px;">Action</th>
                </tr>
                @foreach($data as $data)
                <tr style="text-align:center;">
                    <td>{{$data->title}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->description}}</td>
                    <td> <img src="/foodimage/{{$data->image}}" height="200" width="200"></td>
                    <td><a href="{{url('/deletemenu',$data->id)}}">Delete</a>
</td><td><a href="{{url('/updatefood',$data->id)}}">Update</a></
                </td>
 
                </tr>
                @endforeach
            </table>
        </div>
        <br>
        <br>

            
        </div>
     
  </div>
   
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include("admin.adminscript")
  </body>
</html>