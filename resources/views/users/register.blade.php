<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 1.5rem;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            font-size: 1rem;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 0.75rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-messages,
        .success-message {
            margin-bottom: 1rem;
            padding: 0.75rem;
            border-radius: 5px;
            text-align: left;
        }

        .error-messages {
            background-color: #f8d7da;
            color: #721c24;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
        }

        p {
            margin-top: 1rem;
            color: #555;
        }

        p a {
            color: #007bff;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        <!-- عرض أي رسائل خطأ -->
        @if($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- عرض رسالة النجاح -->
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="user_name">Username:</label>
                <input type="text" name="user_name" id="user_name" placeholder="Enter your username" required>
            </div>

            <div>
                <label for="user_email">Email:</label>
                <input type="email" name="user_email" id="user_email" placeholder="Enter your email" required>
            </div>

            <div>
                <label for="user_pass">Password:</label>
                <input type="password" name="user_pass" id="user_pass" placeholder="Enter your password" required>
            </div>

            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="{{ route('login') }}">Login here</a>.</p>
    </div>
</body>
</html>
