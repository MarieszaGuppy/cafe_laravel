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
</head>

<body>
    <div class="min-h-full">
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="grid-container">
                    <div class="grid-image">
                        <img src="storage/img/bg.jpg" alt="Auth banner">
                    </div>
                    <div class="grid-text">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
