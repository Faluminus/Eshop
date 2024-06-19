<x-app-layout>
    <h1>Stuff in cart</h1>
    <div class="flex flex-col">
        @foreach($cart as $product)
        <div class="flex flex-row gap-6">
            <h2>{{$product['title']}}</h2>
            <h2>{{$product['price'] * $product['quantity']}}$</h2>
            <h2>{{$product['quantity']}}</h2>
            <form action="{{url('addcart',$product['id'])}}" method="post">
                @csrf
                <Button>Add more<Button>
            </form>
            <form action="{{url('removecart',$product['id'])}}" method="post"> 
                @csrf
                <Button>Remove one<Button>
            </form>
        </div>
        @endforeach
        <form action="{{url('cleancart')}}" method="post"> 
                @csrf
                <Button>Send order<Button>
        </form>
        <a href="{{url('/')}}">Main page</a>
    </div>
</x-app-layout>
