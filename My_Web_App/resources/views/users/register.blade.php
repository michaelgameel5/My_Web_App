<!DOCTYPE html>
<html>
<head>
    <title>Register - My Web App</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 400px; }
        div { margin-bottom: 10px; }
        label { display: block; }
        input { width: 100%; padding: 5px; margin-top: 3px; }
        button { padding: 8px 15px; background: #4CAF50; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Register for My Web App</h1>
    <form method="POST" action="{{ route('do_register') }}">
        @csrf
        
        <div>
            <input type="text" name="name" placeholder="Enter your name" required>
        </div>
        
        <div>
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        
        <div>
            <input type="password" name="password" placeholder="Enter your password" required>
        </div>
        
        <div>
            <button type="submit">Register</button>
        </div>
        
        <div>
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </div>
    </form>
</body>
</html>