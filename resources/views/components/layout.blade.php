<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PokeLang</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">
    <x-header />

    <main>
        <div class="max-w-7xl min-h-screen mx-auto py-6 px-8">
            {{ $slot }}
        </div>
    </main>

    <footer>

    </footer>

    
</body>
</html>