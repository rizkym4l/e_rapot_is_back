<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-blue-100">
    <div class="flex flex-col justify-center items-center h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold text-center text-gray-800">Register</h1>
            <form action="{{ route('register.save') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input style="background-color: white" name="name" type="text" placeholder="Name"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 @error('name') border-red-500 @enderror" />
                    @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input style="background-color: white" name="email" type="email" placeholder="Email Address"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 @error('email') border-red-500 @enderror" />
                    @error('email')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input style="background-color: white" name="password" type="password" placeholder="Enter Password"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 @error('password') border-red-500 @enderror" />
                    @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input style="background-color: white" name="password_confirmation" type="password"
                        placeholder="Confirm Password"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 @error('password_confirmation') border-red-500 @enderror" />
                    @error('password_confirmation')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Register
                        Account</button>
                </div>
                <p class="text-center text-sm text-gray-600">Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 hover:underline">Login</a>
                </p>
            </form>
            <div class="flex items-center my-4">
                <hr class="w-full border-gray-300" />
                <p class="px-3 text-sm text-gray-500">OR</p>
                <hr class="w-full border-gray-300" />
            </div>
            <div class="space-y-2">
                <button type="button"
                    class="flex items-center justify-center w-full p-2 space-x-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                        <path
                            d="M16.318 13.714v5.484h9.078c-0.37 2.354-2.745 6.901-9.078 6.901-5.458 0-9.917-4.521-9.917-10.099s4.458-10.099 9.917-10.099c3.109 0 5.193 1.318 6.38 2.464l4.339-4.182c-2.786-2.599-6.396-4.182-10.719-4.182-8.844 0-16 7.151-16 16s7.156 16 16 16c9.234 0 15.365-6.49 15.365-15.635 0-1.052-0.115-1.854-0.255-2.651z">
                        </path>
                    </svg>
                    <p class="text-gray-600">Register with Google</p>
                </button>
                <button type="button"
                    class="flex items-center justify-center w-full p-2 space-x-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                        <path
                            d="M16 0.396c-8.839 0-16 7.167-16 16 0 7.073 4.584 13.068 10.937 15.183 0.803 0.151 1.093-0.344 1.093-0.772 0-0.38-0.009-1.385-0.015-2.719-4.453 0.964-5.391-2.151-5.391-2.151-0.729-1.844-1.781-2.339-1.781-2.339-1.448-0.989 0.115-0.968 0.115-0.968 1.604 0.109 2.448 1.645 2.448 1.645 1.427 2.448 3.744 1.74 4.661 1.328 0.14-1.031 0.557-1.74 1.011-2.135-3.552-0.401-7.287-1.776-7.287-7.907 0-1.751 0.62-3.177 1.645-4.297-0.177-0.401-0.719-2.031 0.141-4.235 0 0 1.339-0.427 4.4 1.641 1.281-0.355 2.641-0.532 4-0.541 1.36 0.009 2.719 0.187 4 0.541 3.043-2.068 4.381-1.641 4.381-1.641 0.859 2.204 0.317 3.833 0.161 4.235 1.015 1.12 1.635 2.547 1.635 4.297 0 6.145-3.74 7.5-7.296 7.891 0.556 0.479 1.077 1.464 1.077 2.959 0 2.14-0.020 3.864-0.020 4.385 0 0.416 0.28 0.916 1.104 0.755 6.4-2.093 10.979-8.093 10.979-15.156 0-8.833-7.161-16-16-16z">
                        </path>
                    </svg>
                    <p class="text-gray-600">Register with GitHub</p>
                </button>
            </div>
        </div>
    </div>
</body>

</html>
