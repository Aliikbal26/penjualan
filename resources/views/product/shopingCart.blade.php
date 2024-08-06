@extends('template.mainUser')
@section('content')

<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <div class="container mx-auto p-4 my-6 bg-white rounded shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Shopping Cart</h2>
            @if (session('success'))
            <div class="alert bg-blue-500 text-white p-4 rounded-md mb-4s">
                {{ session('success') }}
            </div>
            @endif

            @if ($products->isNotEmpty())
            @foreach ($products as $item)
            <div class="mb-2">
                <div class="flex justify-between items-center bg-gray-100 p-2 my-2 rounded">
                    <div class="flex items-center">
                        <img src="https://cdn.vcgamers.com/news/wp-content/uploads/2022/11/Cara-Cek-Nomor-AXIS.png" alt="Product" class="w-16 h-16 rounded mr-4">
                        <div>
                            <h3 class="text-lg font-semibold">{{$item->product->name_product}}</h3>
                            <p class="text-gray-600">Category: {{ $item->product->kode_product ?? 'Unknown' }}</p>
                        </div>
                    </div>
                    <div class="text-gray-800">
                        <p class="text-lg font-semibold">{{$item->product->selling_price}}</p>
                        <p class="text-sm text-gray-600">QTY: {{$item->quantity}}</p>
                    </div>
                    <form action="{{route('deleteCart')}}" method="post">
                        @csrf
                        <button class="text-red-500 hover:text-red-700" type="submit" value="{{$item->product_id}}" name="deleteCart">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </form>
                </div>
                @endforeach
                @else
                <div class="flex justify-between items-center bg-gray-100 p-4 rounded">
                    <h1 class="text-center">{{$status}}</h1>
                </div>
                @endif
            </div>

            <!-- Repeat for other items -->
            <form action="checkOut" method="post">
                @csrf
                <div class="flex justify-between items-center mt-6 pt-6 border-t">
                    <div class="text-gray-800">
                        <p class="text-lg font-semibold">Total:</p>
                        <p class="text-lg font-semibold">Rp. {{ number_format($total,2)}}</p>
                    </div>
                    <button type="submit" name="checkOut" value="{{$total}}" class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600">
                        Check Out
                    </button>
                </div>
            </form>
        </div>

        @endsection