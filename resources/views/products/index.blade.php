<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - CRUD Operations</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-warning {
            background-color: #ffc107;
            color: #333;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 10px;
            border-bottom: 1px solid #eee;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #555;
        }
        tr:hover td {
            background-color: #fafafa;
        }
        .actions {
            display: flex;
            gap: 6px;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .alert-success {
            margin-top: 10px;
            padding: 10px 15px;
            border-radius: 4px;
            background-color: #d4edda;
            color: #155724;
            font-size: 14px;
        }
        .pagination {
            margin-top: 20px;
        }
        .pagination svg {
            width: 20px;
        }
        .pagination > * {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <h1>Products</h1>
            <a href="{{ route('products.create') }}" class="btn btn-primary">+ Add Product</a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($product->description, 40) ?? 'N/A' }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->created_at->format('Y-m-d') }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary">View</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            {{ $products->links() }}
        </div>
    </div>
</body>
</html>


