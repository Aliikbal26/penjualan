@extends('template.mainUser')
@section('content')

<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <div class="container mx-auto p-4 my-6 bg-white rounded shadow-lg">

            <div class="container mx-auto py-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <!-- Informasi Pengiriman -->
                    <div class="mb-6">
                        <h2 class="md:text-2xl font-bold mb-4">Informasi Pengiriman</h2>
                        <div class="flex items-center">
                            <span class="font-semibold text-gray-700">Nama :</span>
                            <span class="ml-2">{{$user->name}}</span>
                        </div>
                        <div class="flex items-center mt-2">
                            <span class="font-semibold text-gray-700">Alamat :</span>
                            <span class="ml-2">Jl. Contoh Alamat No.123, Kota, Provinsi, 12345</span>
                        </div>
                        <div class="flex items-center mt-2">
                            <span class="font-semibold text-gray-700">Email :</span>
                            <span class="ml-2">{{$user->email}}</span>
                        </div>
                    </div>

                    <!-- Ringkasan Pesanan -->
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold mb-4">Ringkasan Pesanan</h2>
                        <div class="border-b pb-4 mb-4">
                            @foreach ($products as $items)
                            <div class="flex justify-between items-center">
                                <span class="font-semibold text-gray-500">{{$items->product->name_product}}</span>
                                <span class="text-gray-500">
                                    <p>{{$items->quantity}} x</p>{{number_format($items->product->selling_price)}}
                                </span>
                            </div>
                            @endforeach
                        </div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-semibold text-gray-700">Total Product</span>
                            <span class="text-gray-500">{{($totalQuantity)}}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-semibold text-gray-700">Total Pembayaran</span>
                            <span class="text-gray-500">{{number_format($total)}}</span>
                        </div>
                    </div>

                    <!-- Konfirmasi Pesanan -->
                    <form action="{{ route('payment') }}" method="POST">
                        @csrf
                        <div class="text-right">
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Pay</button>
                        </div>
                    </form>

                </div>
            </div>
            @endsection