<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-slate-100 font-[Poppins]">
    <div class="relative flex flex-col justify-center items-center min-h-screen bg-cover bg-center"
        style="background-image: url('https://hargabiayaku.id/wp-content/uploads/2023/06/smait-al-kahfi-1024x679.png');">
        <div class="absolute inset-0 bg-blue-900 opacity-50"></div>
        <div class="relative w-full p-8 bg-white rounded-lg shadow-lg border border-gray-200 lg:max-w-md">
            <div class="flex justify-center mb-6">
                <img src="https://tse2.mm.bing.net/th?id=OIP.jBwefGdT24xikvtdnbmxkQHaHZ&pid=Api&P=0&h=180"
                    alt="Logo" class="w-16 h-16">
            </div>
            <h1 class="text-3xl font-semibold text-center text-gray-700 mb-6">Login</h1>
            <form action="{{ route('login.action') }}" method="POST" class="space-y-6">
                @csrf
                @if ($errors->any())
                    <div role="alert"
                        class="alert alert-warning flex items-center text-red-600 bg-red-50 p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <label class="block text-base text-gray-600">Name</label>
                    <input name="name" type="text" placeholder="Enter Nickname"
                        class="w-full p-3 mt-2 bg-white text-gray-700 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div>
                    <label class="block text-base text-gray-600">Password</label>
                    <input name="password" type="password" placeholder="Enter Password"
                        class="w-full p-3 mt-2 bg-white text-gray-700 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="flex items-center justify-between">
                    <label class="flex items-center text-gray-600 cursor-pointer">
                        <input name="remember" type="checkbox"
                            class="form-checkbox h-4 w-4 text-blue-600 bg-white border-gray-300 rounded"
                            checked="checked">
                        <span class="ml-2">Remember me</span>
                    </label>
                    <a href="https://wa.me/6281385088095" class="text-blue-600 hover:text-blue-800 text-sm">Forgot
                        Password?</a>
                </div>
                <div>
                    <button type="submit"
                        class="w-full py-3 mt-4 bg-blue-600 text-white font-semibold rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">Login</button>
                </div>
                {{-- <p class="mt-4 text-center text-gray-600">Don't have an account yet?
                    <a href="{{ route('register') }}"
                        class="text-blue-600 hover:text-blue-800 hover:underline">Register</a>
                </p> --}}
            </form>
        </div>
    </div>
</body>

</html>
