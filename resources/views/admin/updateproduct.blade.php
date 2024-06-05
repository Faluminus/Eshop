<x-app-layout>
<h1>Update product ---> {{$data->title}}</h1>
<form class="flex flex-col" action="{{url('updateproduct',$data->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  <label>Product name</label>
  <input type="text" name="title" placeholder="{{$data->title}}" required="">
  <label>Product price</label>
  <input type="text" name="price" placeholder="{{$data->price}}" required="">
  <label>Product description</label>
  <input type="text" name="description" placeholder="{{$data->description}}" required="">
  <h4>Old image</h4>
  <img src="/productimage/{{$data->image}}" width="200px">
  <input type="file" name="file" required="">
  <button>Submit</button>
</form>
</x-app-layout>