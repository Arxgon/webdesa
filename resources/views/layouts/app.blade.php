<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Liang Anggang — Dashboard</title>

    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-white text-gray-800">
    @include('layouts.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
</body>

</html>