<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@hasSection('title')@yield('title') · Website Desa@else Website Desa @endif</title>

    {{-- Meta/OG tags khusus halaman --}}
    @yield('meta')

    {{-- CSS: sesuaikan; bisa pakai Tailwind (Vite) atau Bootstrap --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 text-gray-900">

    {{-- Navbar (opsional) --}}
    @includeIf('partials.navbar')

    {{-- Breadcrumbs sederhana (opsional) --}}
    @hasSection('breadcrumbs')
    <nav class="container mx-auto px-4 pt-4 text-sm text-gray-600">
        @yield('breadcrumbs')
    </nav>
    @endif

    {{-- Konten utama --}}
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    {{-- Footer (opsional) --}}
    @includeIf('partials.footer')

    {{-- Stack untuk script tambahan halaman --}}
    @stack('scripts')
</body>

</html>
