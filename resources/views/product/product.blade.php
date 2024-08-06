@extends('template.mainUser')
@section('content')
<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="container mx-auto p-4 my-6 bg-white rounded shadow-lg">
            List Product Penjualan
        </h2>

        <!-- modal alert transaksi sukses -->
        @if (session('modal'))
        <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                <div class="flex justify-between items-center border-b pb-3">
                    <h3 class="text-lg font-semibold">Transaksi Sukses</h3>
                    <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="mt-4">
                    <p class="text-gray-600">{{ session('modal') }}</p>
                </div>
                <div class="mt-6 flex justify-end">
                    <button id="okButton" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">OK</button>
                </div>
            </div>
        </div>


        <script>
            document.getElementById('closeModal').addEventListener('click', function() {
                document.getElementById('modal').classList.add('hidden');
            });

            document.getElementById('okButton').addEventListener('click', function() {
                document.getElementById('modal').classList.add('hidden');
            });
        </script>
        @endif

        @if (session('success'))
        <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                <div class="flex justify-between items-center border-b pb-3">
                    <h3 class="text-lg font-semibold">Berhasil</h3>
                    <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="mt-4">
                    <p class="text-gray-600">{{ session('success') }}</p>
                </div>
                <div class="mt-6 flex justify-end">
                    <button id="okButton" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">OK</button>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('closeModal').addEventListener('click', function() {
                document.getElementById('modal').classList.add('hidden');
            });

            document.getElementById('okButton').addEventListener('click', function() {
                document.getElementById('modal').classList.add('hidden');
            });
        </script>
        @endif
        <!-- Tombol Tambah Product -->
        <div class="mb-4">
            <a href="{{ route('inputProduct') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                Tambah Product
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </a>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Product</th>
                            <th class="px-4 py-3">Harga Beli</th>
                            <th class="px-4 py-3">Harga Jual</th>
                            <th class="px-4 py-3">Buy</th>
                            <th class="px-4 py-3">Stock</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    @foreach ($product as $value )
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full" src="https://cdn.vcgamers.com/news/wp-content/uploads/2022/11/Cara-Cek-Nomor-AXIS.png" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{$value->name_product}}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{$value->description}}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$value->purchase_price}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$value->selling_price}}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <form action="{{route('cart')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="cart" value="1">
                                    <button name="product_id" type="submit" value="{{$value->id}}" class="flex items-center justify-between px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        <span>Cart</span>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="file: mt-4 h-6 w-6 p-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$value->stock}}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button onclick="toggleModal('{{ $value->id }}','{{ $value->name_product }}','{{ $value->kode_product }}', '{{ $value->description }}', '{{ $value->purchase_price }}', '{{ $value->selling_price }}', '{{ $value->stock }}')" value="{{ $value->id }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </button>
                                    <form action="{{route('deleteProduct', $value->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>

        </div>


        <!-- Modal backdrop -->
        <div id="modal-backdrop" class="fixed inset-0 bg-black bg-opacity-50 hidden"></div>

        <!-- Modal update product -->
        <div id="modal-update-product" class="fixed inset-0 hidden z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white rounded-lg p-8 mx-auto w-1/2 shadow-lg">
                    <h2 class="text-2xl font-semibold mb-6">Update Product</h2>
                    <form id="updateProductForm" action="{{ route('editProduct', 0) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="productId" name="product_id">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name Product</label>
                            <input type="text" name="name_product" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="kode_product" class="block text-sm font-medium text-gray-700">Kode Product</label>
                            <input type="text" name="kode_product" id="kode_product" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="purchase_price" class="block text-sm font-medium text-gray-700">Purchase Price</label>
                            <input type="number" name="purchase_price" id="purchase_price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="selling_price" class="block text-sm font-medium text-gray-700">Selling Price</label>
                            <input type="number" name="selling_price" id="selling_price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                            <input type="number" name="stock" id="stock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <!-- <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div> -->
                        <div class="flex justify-end">
                            <button type="button" onclick="closeModal()" class="mr-4 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function toggleModal(id, name, kode_product, description, purchase_price, selling_price, stock) {
                document.getElementById('modal-backdrop').classList.remove('hidden');
                document.getElementById('modal-update-product').classList.remove('hidden');

                document.getElementById('productId').value = id;
                document.getElementById('name').value = name;
                document.getElementById('kode_product').value = kode_product;
                document.getElementById('description').value = description;
                document.getElementById('purchase_price').value = purchase_price;
                document.getElementById('selling_price').value = selling_price;
                document.getElementById('stock').value = stock;

                document.getElementById('updateProductForm').action = "{{ route('editProduct', '') }}/" + id;
            }

            function closeModal() {
                document.getElementById('modal-backdrop').classList.add('hidden');
                document.getElementById('modal-update-product').classList.add('hidden');
            }
        </script>
        @endsection