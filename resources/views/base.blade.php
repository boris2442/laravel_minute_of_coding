<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>
    <nav class='bg-gray-800 p-4 flex justify-between space-x-4 '>

        <div class='flex justify-between space-x-4 '>
            <ul class='flex items-center gap-2'>
                <li>
                    <a href='#' class='text-gray-300 '>Accueil</a>
                </li>
                <li>
                    <a href='#' class='text-gray-300 '>Contact</a>
                </li>
            </ul>
        </div>
        <a href='#'><i class='bx  bx-user text-white'></i> </a>
    </nav>



    @yield('content');
</body>

</html>
