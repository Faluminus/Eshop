<x-app-layout>
<h1>Add product</h1>
<form class="flex flex-col" action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
  @csrf
  <label>Product name</label>
  <input type="text" name="title" placeholder="Product title" required="">
  <label>Product price</label>
  <input type="text" name="price" placeholder="Add price" required="">
  <label>Product description</label>
  <input type="text" name="description" placeholder="Description" required="">
  <input type="file" name="file" required="">
  <button>Submit</button>
</form>

<h1>Modify products</h1>
<table>
  <tr>
    <td class="p-6">Title</td>
    <td class="p-6">Price</td>
    <td class="p-6">Description</td>
    <td class="p-6">Image</td>
    <td class="p-6">Update</td>
    <td class="p-6">Delete</td>
  </tr>
  @foreach($data as $product)
  <tr>
    <td class="p-6">{{$product ->title}}</td>
    <td class="p-6">{{$product -> price}}</td>
    <td class="p-6">{{$product -> description}}</td>
    <td class="p-6"><img src="/productimage/{{$product -> image}}" width="200px" ></td>
    <td><Button class="btn btn-primary">Update</Button></td>
    <td><a class="btn btn-primary" href="{{url('deleteproduct',$product->id)}}">Delete</a></td>
  </tr>
  @endforeach
</table>

</x-app-layout>