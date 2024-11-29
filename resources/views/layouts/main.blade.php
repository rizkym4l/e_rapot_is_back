<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        /* Custom animations and effects */
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
        }

        .glass-effect {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        @keyframes glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
            }

            50% {
                box-shadow: 0 0 30px rgba(59, 130, 246, 0.8);
            }
        }

        .hover-glow:hover {
            animation: glow 2s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-[#0B1120] text-white font-['Inter'] antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside
            class="w-80 glass-effect bg-slate-900/50 border-r border-white/10 transform transition-all duration-300 ease-in-out">
            <!-- Logo Section -->
            <div class="p-6">
                <div class="flex items-center gap-3">
                    <div class="relative w-12 h-12">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-blue-500 to-purple-500 rounded-xl animate-gradient">
                        </div>
                        <div class="absolute inset-[2px] bg-white rounded-lg flex items-center justify-center">
                            <img src="https://tse2.mm.bing.net/th?id=OIP.jBwefGdT24xikvtdnbmxkQHaHZ&pid=Api&P=0&h=180"
                                alt="Admin Logo" class="w-8 h-8">
                        </div>
                    </div>
                    <div>
                        <h1
                            class="text-xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                            Admin Panel
                        </h1>
                        <p class="text-xs text-slate-400">Management System</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="mt-6 px-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-3 mb-2 rounded-xl  text-white transition-all duration-200 hover-glow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.users') }}"
                    class="flex items-center px-4 py-3 mb-2 rounded-xl text-slate-300 transition-all duration-200 hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Users
                </a>

                <a href="{{ route('kelas.index') }}"
                    class="flex items-center px-4 py-3 mb-2 rounded-xl text-slate-300 transition-all duration-200 hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    Class
                </a>

                <a href="{{ route('index.history') }}"
                    class="flex items-center px-4 py-3 mb-2 rounded-xl text-slate-300 transition-all duration-200 hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Student Score History
                </a>
                <a href="{{ route('index.history') }}"
                    class="flex items-center px-4 py-3 mb-2 rounded-xl text-slate-300 transition-all duration-200 hover:bg-white/10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Student and Teacher
                </a>
            </nav>

            <!-- User Profile -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10">
                <div class="relative">
                    <button id="avatarButton"
                        class="w-full flex items-center gap-3 p-2 rounded-xl hover:bg-white/5 transition-colors">
                        <div class="relative">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 p-[2px]">
                                <img src="{{ asset('path-to-avatar.jpg') }}" alt="Avatar"
                                    class="w-full h-full rounded-full object-cover">
                            </div>
                            <div
                                class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-slate-900">
                            </div>
                        </div>
                        <div class="flex-1 text-left">
                            <h3 class="text-sm font-semibold">Admin Name</h3>
                            <p class="text-xs text-slate-400">Super Admin</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-slate-400 transition-transform duration-200" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" id="chevronIcon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu" class="absolute bottom-full left-0 right-0 mb-2 hidden">
                        <div
                            class="glass-effect bg-slate-800/90 rounded-xl border border-white/10 shadow-lg overflow-hidden">
                            {{-- <a href="#"
                                class="flex items-center gap-2 px-4 py-3 text-sm hover:bg-white/10 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Profile
                            </a> --}}
                            <a href="{{ route('logout') }}"
                                class="flex items-center gap-2 px-4 py-3 text-sm text-red-400 hover:bg-white/10 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden">

            <!-- Page Content -->
            <div class="p-6">
                @yield('contentAdmin')
            </div>
        </main>
    </div>

    <script>
        // Toggle dropdown menu for avatar
        document.getElementById('avatarButton').addEventListener('click', function() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            const chevronIcon = document.getElementById('chevronIcon');

            dropdownMenu.classList.toggle('hidden');
            chevronIcon.style.transform = dropdownMenu.classList.contains('hidden') ? 'rotate(0deg)' :
                'rotate(180deg)';
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdownMenu = document.getElementById('dropdownMenu');
            const avatarButton = document.getElementById('avatarButton');

            if (!avatarButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
                document.getElementById('chevronIcon').style.transform = 'rotate(0deg)';
            }
        });
    </script>
</body>

</html>
