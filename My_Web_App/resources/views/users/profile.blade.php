<!DOCTYPE html>
<html>
<head>
    <title>Profile - My Web App</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { margin-bottom: 10px; }
        p { margin-bottom: 20px; }
        div { margin-bottom: 10px; }
        b { display: inline-block; width: 80px; }
        .logout { 
            background: #4CAF50; color: white; padding: 8px 15px; text-decoration: none; display: inline-block; margin-top: 15px; }
    </style>
</head>
<body>
    <h1>Welcome, {{ $user->name }}</h1>
    <p>This is your profile page.</p>
    
    <div><b>Name:</b> {{ $user->name }}</div>
    <div><b>Email:</b> {{ $user->email }}</div>
    <div><b>Role:</b> {{ $user->getRoleNames()->first() }}</div>
    <div><b>Joined:</b> {{ $user->created_at->format('Y-m-d') }}</div>
    
    <a href="{{ route('do_logout') }}" class="logout">Logout</a>
</body>
</html>