<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
</head>
<body>
    <h1>My Account</h1>
    
    @if(session('api_token'))
        <div>
            <h3>Your API Token:</h3>
            <code>{{ session('api_token') }}</code>
        </div>
    @endif

    <div>
        <h3>Welcome {{ auth()->user()->name }}</h3>
        <!-- Other account information -->
    </div>
</body>
</html>