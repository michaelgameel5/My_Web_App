<!DOCTYPE html>
<html>
<head>
    <title>Book Store - My Web App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            line-height: 1.6;
        }
        .nav-container {
            background-color: #333;
            padding: 10px 20px;
            color: white;
        }
        .nav-links {
            display: flex;
            justify-content: space-between;
        }
        .nav-links a {
            display: inline-block;
            margin-right: 15px;
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .nav-links a:hover {
            background-color: #45a049;
        }
        .content {
            margin: 20px;
        }
        .user-nav {
            display: flex;
            align-items: center;
        }
        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .book-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            background-color: #f9f9f9;
            transition: transform 0.3s ease;
        }
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .book-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .book-author {
            color: #666;
            margin-bottom: 8px;
        }
        .book-price {
            font-weight: bold;
            color: #4CAF50;
        }
        .book-description {
            margin: 10px 0;
            color: #555;
        }
        .action-buttons {
            margin-top: 15px;
            display: flex;
            gap: 8px;
        }
        
        .btn {
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
            font-size: 14px;
            display: inline-block;
        }
        
        .btn-edit {
            background-color: #2196F3;
        }
        
        .btn-delete {
            background-color: #f44336;
        }
        
        .btn-add {
            background-color: #4CAF50;
            margin-bottom: 20px;
            font-weight: bold;
            padding: 8px 16px;
        }
        
        .book-quantity {
            margin: 10px 0;
            font-size: 14px;
        }
        
        .in-stock {
            color: #4CAF50;
            font-weight: bold;
        }
        
        .out-of-stock {
            color: #f44336;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="nav-container">
        <div class="nav-links">
            <div>
                <a href="{{ route('welcome') }}">Home</a>
                <a href="{{ route('books.index') }}">Book Store</a>
            </div>
            <div class="user-nav">
                @auth
                    <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                    <a href="{{ route('do_logout') }}">Logout</a>
                @else
                    <a href="{{ route('register') }}">Register</a>
                    <a href="{{ route('login') }}">Login</a>
                @endauth
            </div>
        </div>
    </div>
    
    <div class="content">
        <h1>Book Store</h1>
        <p>Browse our collection of books</p>
        @hasrole('Admin')
        <a href="{{ route('books.create') }}" class="btn btn-add">+ Add New Book</a>
        @endhasrole

        <div class="book-grid">
            @foreach($books as $book)
                <div class="book-card">
                    <div class="book-title">{{ $book->title }}</div>
                    <div class="book-author">by {{ $book->author }}</div>
                    <div class="book-description">{{ \Illuminate\Support\Str::limit($book->description, 100) }}</div>
                    <div class="book-price">${{ number_format($book->price, 2) }}</div>
                    <p class="book-quantity {{ $book->quantity > 0 ? 'in-stock' : 'out-of-stock' }}">
                        @if($book->quantity > 0)
                            <i class="fas fa-check-circle"></i> {{ $book->quantity }} in stock
                        @else
                            <i class="fas fa-times-circle"></i> Out of stock
                        @endif
                    </p>
                    
                    <div class="action-buttons">
                        @hasrole('Admin')
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-edit">Edit</a>
                        <a href="{{ route('books.delete', $book->id) }}" class="btn btn-delete">Delete</a>
                        @endhasrole
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
