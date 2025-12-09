<nav class="fixed top-0 w-full z-50 bg-[#0A332C] text-white py-4 shadow">
    <div class="container mx-auto flex justify-between items-center px-4" x-data="{ open: false }">

        <!-- Logo -->
        <div class="flex items-center gap-2 text-xl font-semibold">
            <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="h-8" />
            {{ $identity->nama_desa ?? 'Desa' }}
        </div>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex gap-8 text-sm font-medium">
            <li><a href="{{ route('landing') }}" class="hover:text-orange-400">{{ __('navbar.home') }}</a></li>

            <!-- Dropdown Profile -->
            <li class="relative group">
                <a href="#profile" class="hover:text-orange-400 flex items-center gap-1">
                    {{ __('navbar.profile') }}
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4 mt-0.5 transition-transform group-hover:rotate-180" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <ul
                    class="absolute left-0 mt-3 w-48 bg-white text-gray-800 shadow-lg rounded-md py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                    <li><a href="{{ route('history') }}" class="block px-4 py-2 hover:bg-gray-100">Sejarah
                            Desa</a></li>
                    <li><a href="{{ route('profile-area') }}" class="block px-4 py-2 hover:bg-gray-100">Profil
                            Wilayah</a></li>
                    <li><a href="{{ route('profile-potention') }}" class="block px-4 py-2 hover:bg-gray-100">Profil
                            Potensi</a></li>
                    <li><a href="{{ route('development') }}" class="block px-4 py-2 hover:bg-gray-100">Pembangunan</a>
                    </li>
                    <li><a href="{{ route('stall') }}" class="block px-4 py-2 hover:bg-gray-100">Lapak</a></li>
                </ul>
            </li>

            <li><a href="#data" class="hover:text-orange-400">{{ __('navbar.data') }}</a></li>
            <li><a href="#news" class="hover:text-orange-400">{{ __('navbar.news') }}</a></li>
            <li><a href="#photos" class="hover:text-orange-400">{{ __('navbar.gallery') }}</a></li>
        </ul>

        <!-- Tombol Kontak Desktop -->
        <div class="hidden md:flex items-center gap-4">
            <a href="#" class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-md text-sm">
                {{ __('navbar.contact') }}
            </a>
        </div>

        <!-- Hamburger Button -->
        <button @click="open = true"
            class="md:hidden flex items-center justify-center p-2 rounded-md hover:bg-gray-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Mobile Menu Slide-In -->
        <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 z-50 transition-opacity" @click="open=false">
        </div>

        <div x-show="open" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300 transform" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="fixed top-0 left-0 w-64 h-full bg-[#0A332C] z-50 shadow-lg overflow-y-auto">

            <div class="flex justify-between items-center p-4 border-b border-gray-700">
                <span class="text-xl font-semibold text-white">Menu</span>
                <button @click="open=false" class="p-2 rounded-md hover:bg-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <ul class="flex flex-col mt-4 space-y-2 text-white text-sm">
                <li><a href="{{ route('landing') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">Home</a></li>

                <!-- Profile Dropdown Mobile -->
                <li x-data="{ dropdown: false }" class="relative">
                    <button @click="dropdown = !dropdown"
                        class="w-full text-left px-4 py-2 hover:bg-gray-700 rounded flex justify-between items-center">
                        Profile
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform"
                            :class="{'rotate-180': dropdown}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul x-show="dropdown" x-transition class="mt-1 bg-[#0A332C] space-y-1 rounded-md overflow-hidden">
                        <li><a href="{{ route('history') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">Sejarah
                                Desa</a></li>
                        <li><a href="{{ route('profile-area') }}"
                                class="block px-4 py-2 hover:bg-gray-700 rounded">Profil Wilayah</a></li>
                        <li><a href="{{ route('profile-potention') }}"
                                class="block px-4 py-2 hover:bg-gray-700 rounded">Profil Potensi</a></li>
                        <li><a href="{{ route('development') }}"
                                class="block px-4 py-2 hover:bg-gray-700 rounded">Pembangunan</a></li>
                        <li><a href="{{ route('stall') }}" class="block px-4 py-2 hover:bg-gray-700 rounded">Lapak</a>
                        </li>
                    </ul>
                </li>

                <li><a href="#data" class="block px-4 py-2 hover:bg-gray-700 rounded">Data Desa</a></li>
                <li><a href="#news" class="block px-4 py-2 hover:bg-gray-700 rounded">Berita</a></li>
                <li><a href="#photos" class="block px-4 py-2 hover:bg-gray-700 rounded">Galeri</a></li>
                <li class="p-6"><a href="#"
                        class="block px-4 py-2 hover:bg-orange-600 bg-orange-500 rounded text-white text-center">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Pastikan menambahkan Alpine.js -->
<script src="//unpkg.com/alpinejs" defer></script>
