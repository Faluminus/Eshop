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
</x-app-layout>