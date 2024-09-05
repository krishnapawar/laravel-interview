<table class="table mt-2">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>CreatedAt</th>
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
            </tr>
        @empty
            <tr>
                <td colspan="5">No products found.</td>
            </tr>
        @endforelse
    </tbody>
</table>