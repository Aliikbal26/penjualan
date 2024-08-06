@extends('template.mainUser')
@section('content')

<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h4 class="mb-4 my-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Add Product
        </h4>
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

            <h2 class="text-2xl font-bold mb-4">Tambah Produk</h2>
            <form action="{{ route('addProduct') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name_product" class="block text-gray-700">Nama Produk</label>
                    <input type="text" id="name_product" name="name_product" value="{{ old('name_product') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-md" required>
                    @error('name_product')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="kode_product" class="block text-gray-700">Kode Produk</label>
                    <input type="text" id="kode_product" name="kode_product" value="{{ old('kode_product') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('kode_product')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Deskripsi</label>
                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="selling_price" class="block text-gray-700">Harga Jual</label>
                    <input type="number" id="selling_price" name="selling_price" value="{{ old('selling_price') }}" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('selling_price')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="purchase_price" class="block text-gray-700">Harga Beli</label>
                    <input type="number" id="purchase_price" name="purchase_price" value="{{ old('purchase_price') }}" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('purchase_price')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="stock" class="block text-gray-700">Stok</label>
                    <input type="text" id="stock" name="stock" value="{{ old('stock') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('stock')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Tambah Produk</button>
                </div>
            </form>
        </div>
    </div>

    @endsection