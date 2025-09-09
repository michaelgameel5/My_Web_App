<!DOCTYPE html>
<html>
<head>
    <title>Login - My Web App</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 400px; }
        div { margin-bottom: 10px; }
        label { display: block; }
        input { width: 100%; padding: 5px; margin-top: 3px; }
        button { padding: 8px 15px; background: #4CAF50; color: white; border: none; cursor: pointer; }
        .alert { padding: 10px; background-color: #f44336; color: white; margin-bottom: 15px; }
        .error-text { color: red; font-size: 0.9em; margin-top: 3px; }
    </style>
</head>
<body>
    <h1>Login to My Web App</h1>
    
    @if($errors->any())
        <div class="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('do_login') }}">
        @csrf
        
        <div>
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        
        <div>
            <input type="password" name="password" placeholder="Enter your password" required>
        </div>
        
        <div>
            <button type="submit">Login</button>
        </div>
        
        <div>
            Don't have an account? <a href="{{ route('register') }}">Register</a>
        </div>
    </form>
</body>
</html>