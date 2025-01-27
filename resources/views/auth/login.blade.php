<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>

<body>
    <h1>Login Page</h1>
    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" required>

        @error('email')
            <div>{{ $message }}</div>
        @enderror

        <label for="password">Password:</label>
        <input type="password" id="password" required>
        @error('password')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Login</button>
    </form>
</body>

</html>
