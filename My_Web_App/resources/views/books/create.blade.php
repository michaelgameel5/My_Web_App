<!DOCTYPE html>
<html>
<head>
    <title>Add New Book - My Web App</title>
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
            max-width: 800px;
        }
        .user-nav {
            display: flex;
            align-items: center;
        }
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group textarea {
            height: 150px;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            color: white;
        }
        .btn-primary {
            background-color: #4CAF50;
        }
        .btn-secondary {
            background-color: #6c757d;
            text-decoration: none;
            display: inline-block;
            margin-left: 10px;
        }
        .form-actions {
            margin-top: 20px;
            display: flex;
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
        <h1>Add New Book</h1>
        
        <div class="form-container">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>
                </div>
                
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" id="author" name="author" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="price">Price ($)</label>
                    <input type="number" id="price" name="price" step="0.01" required>
                </div>
                
                <div class="form-group">
                    <label for="quantity">Quantity in Stock</label>
                    <input type="number" id="quantity" name="quantity" value="0" required>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Add Book</button>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
