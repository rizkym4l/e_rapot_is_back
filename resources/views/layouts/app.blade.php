<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title', 'Dashboard')</title>
    <style>
        * {
            scroll-behavior: smooth
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateTime() {
                var now = new Date();
                var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
                    'September', 'Oktober', 'November', 'Desember'
                ];
                var day = days[now.getDay()];
                var date = now.getDate();
                var month = months[now.getMonth()];
                var year = now.getFullYear();
                var hours = now.getHours().toString().padStart(2, '0');
                var minutes = now.getMinutes().toString().padStart(2, '0');
                var seconds = now.getSeconds().toString().padStart(2, '0');
                var formattedTime = day + ', ' + date + ' ' + month + ' ' + year + ' ' + hours + ':' + minutes +
                    ':' + seconds;
                document.getElementById('current-time').textContent = formattedTime;
            }

            setInterval(updateTime, 1000);
            updateTime();
        });
    </script>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1;
            right: 0;
        }


        .dropdown-menu a {
            display: block;
            padding: 8px 16px;
            color: black;
            text-decoration: none;
        }

        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body class=" h-full font-[Poppins]">
    <div class="drawer drawer-mobile h-full">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col h-full">
            <nav class="bg-white shadow-2xl border-b-2 border-slate-200 py-4 px-6 flex justify-between items-center">
                @if (Auth::user()->role == 'guru')
                    <a href={{ route('guru.index') }}>
                    @else
                        <a href={{ route('dashboard') }}>
                @endif

                <div id="logo" class="flex items-center">
                    <img src="https://tse2.mm.bing.net/th?id=OIP.jBwefGdT24xikvtdnbmxkQHaHZ&pid=Api&P=0&h=180"
                        alt="Logo" class="w-10 h-10 mx-2">
                    <span class="ml-2 text-lg font-semibold text-gray-700">Eraport</span>
                </div>
                </a>

                <div class="flex items-center space-x-4 ">

                    <span id="current-time" class="text-gray-600 hidden sm:block"></span>
                    @auth
                        <div class="relative dropdown">
                            <button class="flex items-center focus:outline-none">
                                <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : 'https://via.placeholder.com/40' }}"
                                    alt="Profile" class="rounded-full h-10 w-10">
                            </button>
                            <div class="dropdown-menu mt-2 w-48 py-2 bg-white rounded-md shadow-xl">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <a href="#" id="upload-image-button">Upload Image</a>
                            </div>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                </div>
            </nav>

            <div class="sm:p-6 flex-grow bg-gradient-to-b from-slate-100 to-slate-50">
                @yield('contents')
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class=" bg-slate-50">
                <path fill="#0099ff" fill-opacity="1"
                    d="M0,160L120,176C240,192,480,224,720,224C960,224,1200,192,1320,176L1440,160L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
                </path>
            </svg>
            <footer class=" bg-[#0099ff] text-white py-6 ">
                <div class="container mx-auto text-center">
                    <p>&copy; 2024 Al Kahfi. All rights reserved.</p>

                </div>

            </footer>

        </div>


        <div id="upload-image-modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg p-6 shadow-lg">
                <h2 class="text-lg font-semibold mb-4">Upload Image</h2>
                <form id="upload-image-form" action="{{ route('profile.upload') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" accept="image/*" required>
                    <div class="flex justify-end mt-4">
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2"
                            id="cancel-upload">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Upload</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var uploadButton = document.getElementById('upload-image-button');
                var modal = document.getElementById('upload-image-modal');
                var cancelUploadButton = document.getElementById('cancel-upload');
                var dropdown = document.getElementsByClassName("dropdown")[0];
                console.log(dropdown)
                var dropdownMenu = document.getElementsByClassName("dropdown-menu")[0];
                console.log(dropdownMenu)


                dropdown.addEventListener('click', function() {
                    dropdownMenu.style.display = 'block'
                })

                uploadButton.addEventListener('click', function() {
                    modal.classList.remove('hidden');
                });

                cancelUploadButton.addEventListener('click', function() {
                    modal.classList.add('hidden');
                });
            });
        </script>
</body>

</html>
