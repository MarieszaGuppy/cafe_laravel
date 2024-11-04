<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TeaJam Cafe</title>
    <link rel="shortcut icon" href="{{ asset('storage/img/logo.png') }}">
    @vite(['resources/css/style.css'])
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Henny+Penny&display=swap');

        /* Background styling */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #d1f5d3;
            /* Light green background */
            font-family: Arial, sans-serif;
        }

        /* Center container */
        .container {
            text-align: center;
        }

        /* Title styling */
        .title {

            font-family: "Henny Penny", system-ui;
            font-weight: 400;
            font-style: normal;
            font-size: 3rem;
            color: #3b3b3b;
            /* Dark text color for contrast */
            margin-bottom: 20px;
        }

        /* Login button styling */
        .login-button {
            padding: 12px 24px;
            font-size: 1rem;
            font-weight: bold;
            color: #ffffff;
            background-color: #4caf50;
            /* Green button color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        /* Button hover effect */
        .login-button:hover {
            background-color: #388e3c;
            /* Darker green on hover */
        }
    </style>
</head>

<body>

    <!-- Center container for content -->
    <div class="container">
        <div class="title"><img src="{{ asset('storage/img/tea.png') }}" alt=""></div>
        <div class="title">TeaJam Cafe</div>
        <!-- Login button with link to login page -->
        @guest
            <a href="/login" class="login-button">Login</a>
        @endguest

        @auth
            <form method="POST" action="/logout">
                @csrf
                <button class="btn" style="color: #FFC300">Keluar</button>
            </form>
        @endauth
    </div>

</body>

</html>
