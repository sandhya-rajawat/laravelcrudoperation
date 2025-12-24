<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product - CRUD Operations</title>
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
            max-width: 800px;
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
            padding: 10px 20px;
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
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .product-details {
            margin-bottom: 30px;
        }
        .detail-row {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }
        .detail-label {
            font-weight: 600;
            color: #666;
            margin-bottom: 5px;
        }
        .detail-value {
            color: #333;
            font-size: 16px;
        }
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product Details</h1>

        <div class="product-details">
            <div class="detail-row">
                <div class="detail-label">ID</div>
                <div class="detail-value">{{ $product->id }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Product Name</div>
                <div class="detail-value">{{ $product->name }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Description</div>
                <div class="detail-value">{{ $product->description ?? 'N/A' }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Price</div>
                <div class="detail-value">${{ number_format($product->price, 2) }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Created At</div>
                <div class="detail-value">{{ $product->created_at->format('Y-m-d H:i:s') }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Updated At</div>
                <div class="detail-value">{{ $product->updated_at->format('Y-m-d H:i:s') }}</div>
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</body>
</html>

