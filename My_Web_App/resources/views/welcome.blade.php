<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Web App</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }
        
        .nav-container {
            background-color: #2c3e50;
            padding: 15px 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .nav-links {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .nav-links a {
            display: inline-block;
            margin-right: 15px;
            padding: 8px 16px;
            background-color: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .nav-links a:hover {
            background-color: #219653;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .user-nav {
            display: flex;
            align-items: center;
        }
        
        .hero {
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2980b9, #6dd5fa);
            color: white;
            text-align: center;
            padding: 20px;
        }
        
        .hero-content {
            max-width: 800px;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .cta-buttons {
            margin-top: 30px;
        }
        
        .cta-button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .cta-button.secondary {
            background-color: transparent;
            border: 2px solid white;
        }
        
        .cta-button.secondary:hover {
            background-color: rgba(255,255,255,0.1);
        }
        
        .features {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .features h2 {
            text-align: center;
            margin-bottom: 50px;
            font-size: 2rem;
            color: #2c3e50;
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .feature-card {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        
        .feature-card h3 {
            margin-bottom: 15px;
            color: #2c3e50;
        }
        
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #27ae60;
        }
        
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 30px 0;
            margin-top: 50px;
        }
        
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .cta-buttons {
                display: flex;
                flex-direction: column;
                gap: 15px;
                align-items: center;
            }
            
            .nav-links {
                flex-direction: column;
                gap: 15px;
            }
            
            .user-nav {
                margin-top: 15px;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="nav-container">
        <div class="nav-links">
            <div>
                <a href="{{ route('welcome') }}">MY WEB APP</a>
                @auth
                <a href="{{ route('books.index') }}">Book Store</a>
                @endauth
            </div>
            <div class="user-nav">
                @auth
                    <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                    <a href="{{ route('do_logout') }}">Logout</a>
                {{-- @else
                    <a href="{{ route('register') }}">Register</a>
                    <a href="{{ route('login') }}">Login</a> --}}
                @endauth
            </div>
        </div>
    </div>
    
    <div class="hero">
        <div class="hero-content">
            <h1>Welcome to My Web App</h1>
            <p>Discover a world of amazing books and stories. Join our community today and start exploring our extensive collection of literary treasures.</p>
            
            <div class="cta-buttons">
                @auth
                    <a href="{{ route('books.index') }}" class="cta-button">Browse Books</a>
                @else
                    <a href="{{ route('register') }}" class="cta-button">Register</a>
                    <a href="{{ route('login') }}" class="cta-button secondary">Login</a>
                @endauth
            </div>
        </div>
    </div>
    

    <footer>
        <p>&copy; {{ date('Y') }} My Web App. All rights reserved.</p>
    </footer>
</body>
</html>