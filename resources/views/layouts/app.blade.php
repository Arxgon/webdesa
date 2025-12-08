<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $identity->nama_desa ?? 'Identitas Desa' }}</title>

    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-[#f2f5f3] text-slate-900">

    @include('layouts.navbar')

    <main class="mx-auto py-16 space-y-20">
        @yield('content')
    </main>

    @include('layouts.footer')
</body>

</html>