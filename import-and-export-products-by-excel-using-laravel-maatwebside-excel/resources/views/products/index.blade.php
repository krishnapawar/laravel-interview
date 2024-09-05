<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg ">
                <div class="m-5">
                    <div class="flex mr-5 ml-5">
                    <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" required>
                        <button type="submit" class="btn btn-primary">Import Products</button>
                    </form>
                    <a href="{{route('exportProducts')}}" class="btn btn-primary" style="margin-left: 10px;">Download Excel</a>
                    </div>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>CreatedAt</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <a class="btn btn-primary ml-2">Edit</a>
                                        <a class="btn btn-danger">delete</a>
                                            
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No products found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>